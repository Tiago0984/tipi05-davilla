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

    // dd($listaProdutos);

    return view('site.cardapio.cardapio', compact('filtroCategoria', 'listaProdutos'));
}
}
