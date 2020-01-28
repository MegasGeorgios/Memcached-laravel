<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $productos=DB::table('productos')
        ->join('categorias', 'categorias.id', '=', 'productos.categoria_id')
        ->select('productos.*', 'categorias.nombre_categoria')
        ->get();

      return response()->json(['datos'=>$productos],202);
    }


    public function store(Request $request)
    {

      if (!$request->input('nombre_producto') || !$request->input('precio') || !$request->input('caracteristicas') )
      {
            return response()->json(['mensaje'=>'Datos invalidos o incompletos', 'status'=>'error'],422);
      }else {
        $id=$request->id_categoria[0];

        $table = new Producto;
        $table->nombre_producto = $request->nombre_producto;
        $table->precio = $request->precio;
        $table->caracteristicas = $request->caracteristicas;
        $table->categoria_id = $id;
        $table->save();

        return response()->json(['mensaje'=>'Se ha creado el producto!','status'=>'ok'],202);
      }

    }

    public function show($id)
    {
        $producto = Producto::find($id);

        return response()->json(['datos'=>$producto,'status'=>'ok'],200);
    }

    public function update(Request $request, $id)
    {
      $producto = Producto::find($id);

      if (isset($request->nombre_producto) &&
          isset($request->caracteristicas) &&
          isset($request->precio)
        ){

        $producto->update([
          'nombre_producto' => $request->nombre_producto,
          'precio' => $request->precio,
          'caracteristicas' => $request->caracteristicas,
          'categoria_id' => $request->categoria_id,
        ]);


         return response()->json(['mensaje'=>'Se han actualizado los datos correctamente', 'status'=>'ok'],202);
       }else {
           return response()->json(['mensaje'=>'Datos invalidos o incompletos', 'status'=>'error'],422);
       }
    }
}
