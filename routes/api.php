<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos',[ProdutoController::class, 'ListagemProduto']);

Route::post('/produtos',[ProdutoController::class, 'CadastroProduto']);

Route::post('clientes/cadastro',[ClienteController::class, 'storeCliente']);
Route::get('clientes/cadastro',[ClienteController::class, 'CadastroCliente']);