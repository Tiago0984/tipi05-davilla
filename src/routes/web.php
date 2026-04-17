<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/', [SobreController::class, 'sobre'])->name('sobre');
Route::get('/', [CardapioController::class, 'cardapio'])->name('cardapio');
Route::get('/', [PedidosController::class, 'pedidos'])->name('pedidos');
Route::get('/', [RegiaoController::class, 'regiao'])->name('regiao');
Route::get('/', [ContatoController::class, 'contato'])->name('contato');