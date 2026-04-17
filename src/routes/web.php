<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\RegiaoController;
use App\Http\Controllers\SobreController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sobre', [SobreController::class, 'sobre'])->name('sobre');
Route::get('/cardapio', [CardapioController::class, 'cardapio'])->name('cardapio');
Route::get('/pedidos', [PedidosController::class, 'pedidos'])->name('pedidos');
Route::get('/regiao', [RegiaoController::class, 'regiao'])->name('regiao');
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');
