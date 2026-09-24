<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\JsonResponse;

class ProdutoController extends Controller
{
    // GET /api/v1/produtos
    public function index(): JsonResponse
    {
        $produtos = Produto::with('CategoriaProduto:id_categoria,nome_categoria')
            ->where('status_produto', 'ATIVO')
            ->orderBy('ordem_produto')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $produtos,
        ]);
    }

    // GET /api/v1/produtos/{slug}
    public function show($slug): JsonResponse
    {
        $produto = Produto::with('CategoriaProduto:id_categoria,nome_categoria')
            ->where('status_produto', 'ATIVO')
            ->where('slug_produto', $slug)
            ->first();

        if (! $produto) {
            return response()->json([
                'success' => false,
                'message' => 'Produto não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $produto,
        ]);
    }
}
