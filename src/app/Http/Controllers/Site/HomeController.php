<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Banner;

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
            ->inRandomOrder()
            ->limit(8)
            ->get();

        $categoriaAtiva = 'all';

        $banners = Banner::where('status_banner', 'ATIVO')
            ->orderBy('ordem_banner', 'asc')
            ->get();

        $listaPrecos = Produto::where('status_produto', 'ATIVO')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('site.home.home', compact('filtroCategoria', 'listaProdutos', 'categoriaAtiva', 'banners', 'listaPrecos'));
    }
}
