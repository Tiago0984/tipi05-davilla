<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class ProdutoController extends Controller
{
    // Campos do produto devolvidos pela API (sem ordem_produto).
    // A coluna é unid_medida_produto, mas o app espera unid_med_produto.
    public const CAMPOS = [
        'id_produto',
        'nome_produto',
        'slug_produto',
        'id_categoria',
        'descricao_produto',
        'tamanho_produto',
        'unid_medida_produto as unid_med_produto',
        'valor_produto',
        'foto_produto',
        'status_produto',
        'destaque_produto',
        'criado_em_produto',
        'atualizado_em_produto',
    ];

    // GET /api/v1/produtos
    public function index(): JsonResponse
    {
        $produtos = $this->produtosAtivos()
            ->orderBy('nome_produto')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $produtos,
        ]);
    }

    // GET /api/v1/produtos/{slug}
    public function show($slug): JsonResponse
    {
        $produto = $this->produtosAtivos()
            ->where('slug_produto', $slug)
            ->first();

        if (! $produto) {
            return response()->json([
                'success' => false,
                'message' => 'Recurso não encontrado.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $produto,
        ]);
    }

    // Produtos ATIVOS de categorias ATIVAS, com a categoria em categoria_produto
    private function produtosAtivos(): Builder
    {
        return Produto::select(self::CAMPOS)
            ->with(['CategoriaProduto' => fn ($query) => $query->select(CategoriaController::CAMPOS)])
            ->where('status_produto', 'ATIVO')
            ->whereHas('CategoriaProduto', fn ($query) => $query->where('status_categoria', 'ATIVO'));
    }
}
