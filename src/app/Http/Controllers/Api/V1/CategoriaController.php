<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\JsonResponse;

class CategoriaController extends Controller
{
    // GET /api/v1/categorias
    public function index(): JsonResponse
    {
        $categorias = Categoria::select(
            'id_categoria',
            'nome_categoria',
            'descricao_categoria',
            'ordem_categoria',
            'status_categoria'
        )
            ->where('status_categoria', 'ATIVO')
            ->orderBy('ordem_categoria')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $categorias,
        ]);
    }

    // GET /api/v1/categorias/{id}/produtos
    public function produtos($id): JsonResponse
    {
        $categoria = Categoria::where('id_categoria', $id)
            ->where('status_categoria', 'ATIVO')
            ->first();

        if (! $categoria) {
            return response()->json([
                'success' => false,
                'message' => 'Categoria não encontrada.',
            ], 404);
        }

        $produtos = Produto::where('id_categoria', $categoria->id_categoria)
            ->where('status_produto', 'ATIVO')
            ->orderBy('ordem_produto')
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
