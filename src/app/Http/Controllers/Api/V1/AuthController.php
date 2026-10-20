<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validar e-mail e senha
        $dados = $request->validate([
            'email'       => 'required|email',
            'senha'       => 'required|string',
            'device_name' => 'nullable|string|max:100',
        ]);

        // 2. Localizar o cliente pelo e-mail
        $cliente = Cliente::where('email_cliente', $dados['email'])->first();

        // 3. Comparar a senha com o hash
        if (!$cliente || !Hash::check($dados['senha'], $cliente->senha_cliente)) {
            return response()->json([
                'success' => false,
                'message' => 'E-mail ou senha inválidos.',
            ], 401);
        }

        // 4. Confirmar que está ATIVO
        if ($cliente->status_cliente !== 'ATIVO') {
            return response()->json([
                'success' => false,
                'message' => 'Cliente inativo.',
            ], 403);
        }

        // 5. Gerar o token (revoga o anterior do mesmo dispositivo)
        $token = $this->novoToken($cliente, $dados['device_name'] ?? null);

        // 6. Retornar token + dados básicos
        return $this->respostaComToken($cliente, $token, 'Login realizado com sucesso.');
    }

    public function cadastro(Request $request)
    {
        // Telefone sem espaços: "(11) 95843-5174" vira "(11)95843-5174"
        if (is_string($request->input('telefone'))) {
            $request->merge(['telefone' => str_replace(' ', '', $request->input('telefone'))]);
        }

        $dados = $request->validate([
            'nome'         => 'required|string|max:50',
            'email'        => 'required|email|max:80|unique:tbl_clientes,email_cliente',
            'telefone'     => 'required|string|max:14',
            'senha'        => 'required|string|min:8',
            'aceite_termo' => 'accepted',
            'device_name'  => 'nullable|string|max:100',
        ], [
            'email.unique'          => 'Este e-mail já está cadastrado.',
            'aceite_termo.accepted' => 'É necessário aceitar o termo de consentimento.',
        ]);

        $cliente = Cliente::create([
            'nome_cliente'            => $dados['nome'],
            'email_cliente'           => $dados['email'],
            'telefone_cliente'        => $dados['telefone'],
            'senha_cliente'           => Hash::make($dados['senha']),
            'status_cliente'          => 'ATIVO',
            'termo_aceito_em_cliente' => now(),
        ]);

        $token = $this->novoToken($cliente, $dados['device_name'] ?? null);

        return $this->respostaComToken($cliente, $token, 'Cadastro realizado com sucesso.', 201);
    }

    public function logout(Request $request)
    {
        // Apaga só o token usado nesta requisição
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout realizado com sucesso.',
        ]);
    }

    // Um token por dispositivo: um novo login com o mesmo nome derruba o anterior
    private function novoToken(Cliente $cliente, ?string $deviceName): string
    {
        $nomeToken = $deviceName ?: 'app-mobile';

        $cliente->tokens()->where('name', $nomeToken)->delete();

        return $cliente->createToken($nomeToken)->plainTextToken;
    }

    private function respostaComToken(Cliente $cliente, string $token, string $mensagem, int $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $mensagem,
            'data' => [
                'token' => $token,
                'cliente' => [
                    'id_cliente'       => $cliente->id_cliente,
                    'nome_cliente'     => $cliente->nome_cliente,
                    'email_cliente'    => $cliente->email_cliente,
                    'telefone_cliente' => $cliente->telefone_cliente,
                ],
            ],
        ], $status);
    }
}
