<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    // GET /api/v1/cliente
    public function show(Request $request)
    {
        return response()->json([
            'success' => true,
            'data' => $request->user(), // senha_cliente já sai oculta pelo $hidden
        ]);
    }

    // PUT e PATCH /api/v1/cliente
    public function update(Request $request)
    {
        $cliente = $request->user();

        // Telefone sem espaços: "(11) 95843-5174" vira "(11)95843-5174"
        if (is_string($request->input('telefone_cliente'))) {
            $request->merge(['telefone_cliente' => str_replace(' ', '', $request->input('telefone_cliente'))]);
        }

        // PUT e PATCH: cadastro completo, todos os campos obrigatórios
        $dados = $request->validate([
            'nome_cliente'      => 'required|string|max:50',
            'tipo_cliente'      => 'required|string|in:PF,PJ',
            'cpf_cnpj_cliente'  => [
                'required', 'string', 'max:18',
                Rule::unique('tbl_clientes', 'cpf_cnpj_cliente')->ignore($cliente->id_cliente, 'id_cliente'),
            ],
            'data_nasc_cliente' => 'required|date',
            'email_cliente'     => [
                'required', 'email', 'max:80',
                Rule::unique('tbl_clientes', 'email_cliente')->ignore($cliente->id_cliente, 'id_cliente'),
            ],
            'telefone_cliente'  => 'required|string|max:14',
        ]);

        $cliente->update($dados);

        return response()->json([
            'success' => true,
            'message' => 'Dados atualizados com sucesso.',
            'data' => $cliente->fresh(),
        ]);
    }

    // PUT /api/v1/cliente/senha
    public function updateSenha(Request $request)
    {
        $dados = $request->validate([
            'senha_atual' => 'required|string',
            'nova_senha'  => 'required|string|min:8|confirmed|different:senha_atual',
        ]);

        $cliente = $request->user();

        if (!Hash::check($dados['senha_atual'], $cliente->senha_cliente)) {
            return response()->json([
                'success' => false,
                'message' => 'Senha atual incorreta.',
            ], 422);
        }

        $cliente->senha_cliente = Hash::make($dados['nova_senha']);
        $cliente->save();

        // Derruba os outros aparelhos, mantém só o token atual
        $cliente->tokens()->where('id', '!=', $cliente->currentAccessToken()->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Senha atualizada com sucesso.',
        ]);
    }
}