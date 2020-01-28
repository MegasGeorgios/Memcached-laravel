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
}
