<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('ordem_produto')->get();
        return view('admin.produto.index', compact('produtos'));
    }

     public function categoria()
    {
        $categorias = Categoria::orderBy('ordem_categoria')->get();
        
        return view('admin.categoria.index', compact('categorias'));
    }
}
