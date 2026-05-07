<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Categoria;  

use Illuminate\Http\Request; 

class CardapioController extends Controller
{
   public function cardapio()
{
    // Buscar os produtos e categorias do banco de dados
    $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')->orderBy('ordem_categoria')->get();

    // Buscar os produtos ativos e carregar a relação
    $listaProdutos = Produto::with('CategoriaProduto')
        ->where('status_produto', 'ATIVO')
        ->orderBy('ordem_produto')
        ->get();

        $categoriaAtiva = 'all';

    // dd($listaProdutos);

    return view('site.cardapio.cardapio', compact('filtroCategoria', 'listaProdutos', 'categoriaAtiva'));
}

public function showProduto($slug)
{

    // Buscar o produto pelo ID
    $produto = Produto::with('CategoriaProduto')
    ->where('status_produto', 'ATIVO')
    ->where('slug_produto', $slug)
    ->firstOrFail();

    $relacionados = Produto::where('status_produto', 'ATIVO')
        ->where('id_categoria', $produto->id_categoria)
        ->where('id_produto', '!=', $produto->id_produto)
        ->limit(3)
        ->get();

        $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')->orderBy('ordem_categoria')->get();

    // dd($produto);

    // Retornar a view com os detalhes do produto
    return view('site.produto.produto', compact('produto', 'relacionados', 'filtroCategoria'));

}

public function show($id)
{
        $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')
            ->orderBy('ordem_categoria')
            ->get();

        $listaProdutos = Produto::with('CategoriaProduto')
            ->where('status_produto', 'ATIVO')
            ->orderBy('ordem_produto')
            ->get();

        $categoriaAtiva = '.categoria-' . $id;

        return view('site.cardapio.cardapio', compact(
            'filtroCategoria',
            'listaProdutos',
            'categoriaAtiva'
        ));
}

}
