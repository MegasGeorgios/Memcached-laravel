<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('/clientes','ClienteController', ['except'=>['edit','create','destroy'] ]);

Route::resource('/productos','ProductoController', ['except'=>['edit','create','destroy'] ]);

Route::resource('/pedidos','PedidoController', ['except'=>['edit','create','update', 'destroy'] ]);
Route::get('/dashboard','PedidoController@dashboard');

Route::resource('/categorias','CategoriaController', ['only'=>['index','store'] ]);
