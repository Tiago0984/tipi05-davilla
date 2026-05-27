<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProdutoController extends Controller
{
    public function index()
    {
        // 1. Busca os produtos ordenados
        $produtos = Produto::orderBy('ordem_produto')->get();

        // 2. BUSCA AS CATEGORIAS NO BANCO (Esta é a linha que faltava!)
        $categorias = Categoria::orderBy('nome_categoria')->get();
        
        // 3. Envia os produtos E as categorias para a View
        return view('admin.produto.index', compact('produtos', 'categorias'));
    }

    public function categoria()
    {
        $categorias = Categoria::orderBy('ordem_categoria')->get();

        return view('admin.categoria.index', compact('produtos', 'categorias'));
    }

    public function store(Request $request)
    {
        // Validação rigorosa com todos os novos campos do banco
        $request->validate([
            'nome_produto'         => 'required|string|max:30',
            'id_categoria'         => 'required|exists:tbl_categorias,id_categoria', // Garante que a categoria existe no banco
            'descricao_produto'    => 'nullable|string',
            'tamanho_produto'      => 'nullable|string|max:30',
            'unid_medida_produto'  => 'nullable|string|max:10',
            'valor_produto'        => 'required|numeric|min:0',
            'ordem_produto'        => 'required|integer',
            'status_produto'       => 'required|in:ATIVO,INATIVO',
            'destaque_produto'     => 'required|in:SIM,NAO',
            'foto_produto'         => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Gerenciamento do Upload da Foto
        $foto = $request->file('foto_produto');
       $nomeFoto = 'produto/' . $foto->getClientOriginalName();


        // Docker Check: Garante que a estrutura de pastas existe antes de mover o arquivo
        File::ensureDirectoryExists(base_path('public/davilla/images/produto'));
        $foto->move(base_path('public/davilla/images/produto'), $foto->getClientOriginalName());

        // Criação do registro mapeando todos os inputs do formulário
        Produto::create([
            'nome_produto'         => $request->nome_produto,
            'slug_produto'         => Str::slug($request->nome_produto),
            'id_categoria'         => $request->id_categoria,
            'descricao_produto'    => $request->descricao_produto,
            'tamanho_produto'      => $request->tamanho_produto,
            'unid_medida_produto'  => $request->unid_medida_produto,
            'valor_produto'        => $request->valor_produto,
            'ordem_produto'        => $request->ordem_produto,
            'status_produto'       => $request->status_produto,
            'destaque_produto'     => $request->destaque_produto,
            'foto_produto'         => $nomeFoto,
        ]);

        return to_route('admin.produto.index')
            ->with('success', 'Produto criado com sucesso!');
    }
}
