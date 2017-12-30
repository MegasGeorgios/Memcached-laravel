<?php


Route::get('/', function () {
    return view('index');
});

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/productos', function () {
    return view('productos');
});

Route::get('/pedidos', function () {
    return view('pedidos');
});

Route::get('/crear-cliente', function () {
    return view('crear-cliente');
});

Route::get('/crear-producto', function () {
    return view('crear-producto');
});

Route::get('/crear-categoria', function () {
    return view('crear-categoria');
});

Route::get('/crear-pedido', function () {
    return view('crear-pedido');
});

Route::get('/ver-editar-cliente/{id}', function ($id) {
    return view('vistas-editar.ver-editar-cliente', ['id' => $id]);
});

Route::get('/ver-editar-producto/{id}', function ($id) {
    return view('vistas-editar.ver-editar-producto', ['id' => $id]);
});

Route::get('/ver-pedido/{id}', function ($id) {
    return view('vistas-editar.ver-pedido', ['id' => $id]);
});
