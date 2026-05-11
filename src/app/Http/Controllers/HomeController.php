<?php

namespace App\Http\Controllers;
use App\Models\Produto;
use App\Models\Categoria;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $filtroCategoria = Categoria::where('status_categoria', 'ATIVO')
            ->orderBy('ordem_categoria')
            ->get();

        $listaProdutos = Produto::with('CategoriaProduto')
            ->where('status_produto', 'ATIVO')
            ->orderBy('ordem_produto')
            ->limit(8)
            ->get();

        $categoriaAtiva = 'all';

        return view('site.home.home', compact('filtroCategoria', 'listaProdutos', 'categoriaAtiva'));
    }
}
