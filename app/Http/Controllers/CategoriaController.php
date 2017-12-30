<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categorias=Categoria::all();

      return response()->json(['datos'=>$categorias],202);
    }

    public function store(Request $request)
    {
      if (!$request->input('nombre_categoria') || !$request->input('caracteristicas_categoria'))
      {
            return response()->json(['mensaje'=>'Datos invalidos o incompletos', 'status'=>'error'],422);
      }
      Categoria::create([
          'nombre_categoria'=>$request->nombre_categoria,
          'caracteristicas'=>$request->caracteristicas_categoria
      ]);

      return response()->json(['mensaje'=>'Se ha creado la categoria!','status'=>'ok'],202);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
