<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\JsonResponse;

class CategoriaController extends Controller
{
    // Campos da categoria devolvidos pela API (sem ordem_categoria)
    public const CAMPOS = [
        'id_categoria',
        'nome_categoria',
        'descricao_categoria',
        'status_categoria',
        'criado_em_categoria',
        'atualizado_em_categoria',
    ];

    // GET /api/v1/categorias
    public function index(): JsonResponse
    {
        $categorias = Categoria::select(self::CAMPOS)
            ->where('status_categoria', 'ATIVO')
            ->orderBy('nome_categoria')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $categorias,
        ]);
    }

    // GET /api/v1/categorias/{id}/produtos
    public function produtos($id): JsonResponse
    {
        $categoria = Categoria::select(self::CAMPOS)
            ->where('id_categoria', $id)
            ->where('status_categoria', 'ATIVO')
            ->first();

        if (! $categoria) {
            return response()->json([
                'success' => false,
                'message' => 'Recurso não encontrado.',
            ], 404);
        }

        $produtos = Produto::select(ProdutoController::CAMPOS)
            ->where('id_categoria', $categoria->id_categoria)
            ->where('status_produto', 'ATIVO')
            ->orderBy('nome_produto')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'categoria' => $categoria,
                'produtos' => $produtos,
            ],
        ]);
    }
}
