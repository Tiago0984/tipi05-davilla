<?php

// SITE
use App\Http\Controllers\Site\CardapioController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PedidosController;
use App\Http\Controllers\Site\RegiaoController;
use App\Http\Controllers\Site\SobreController;
use Illuminate\Support\Facades\Route;

//ADMIN
use App\Http\Controllers\Admin\DashController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\ProdutoController;



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sobre', [SobreController::class, 'sobre'])->name('sobre');
Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio');
Route::get('/pedidos', [PedidosController::class, 'pedidos'])->name('pedidos');
Route::get('/regiao', [RegiaoController::class, 'regiao'])->name('regiao');
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');

// Rota para exibir o cardápio filtrado por categoria (Sub menu do cardápio)
Route::get('/cardapio/categoria/{id}', [CardapioController::class, 'show'])->name('cardapio.categoria');

// Submenu de Produtos
Route::get('/cardapio/produto/{slug}', [CardapioController::class, 'showProduto'])->name('cardapio.produto');

// Rota para exibir o cardápio filtrado por região (Sub menu de região)
Route::get('/regiao/regiao/{id}', [RegiaoController::class, 'show'])->name('regiao.area');

Route::prefix('admin')->name('admin.')->group(function () {
    // Rotas para o painel administrativo
    // Exemplo: Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/', [DashController::class, 'index'])->name('dash');

    // Rota para a página de categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categoria.store');

    // Rota para desativar e ativar categorias
    Route::patch('/categorias/{id}/desativar', [CategoriaController::class, 'desativar'])
    ->name('categoria.desativar');
    Route::patch('/categorias/{id}/ativar', [CategoriaController::class, 'ativar'])
    ->name('categoria.ativar');

    // Rota para atualizar categorias
    Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categoria.update');



    // Rota para a página de produtos
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produto.index');

    // Rota para criar um novo produto
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produto.store');


});
