<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cliente::all();

        return response()->json(['datos'=>$clientes],202);
    }

    public function store(Request $request)
    {
      if (!$request->input('nombre') || !$request->input('dni') )
      {
            return response()->json(['mensaje'=>'Datos invalidos o incompletos', 'status'=>'error'],422);
      }
      Cliente::create($request->all());

      return response()->json(['mensaje'=>'Se ha creado el cliente','status'=>'ok'],202);

    }

    public function show($dni)
    {
        $cliente= Cliente::find($dni);
        return response()->json(['datos'=>$cliente],202);
    }


    public function update(Request $request, $id)
    {
      $cliente = Cliente::find($id);

      if (isset($request->nombre) &&
          isset($request->dni)
        ){

          $cliente->update([
            'nombre' => $request->nombre,
            'dni' => $request->dni
          ]);


         return response()->json(['mensaje'=>'Se han actualizado los datos correctamente', 'status'=>'ok'],202);
       }else {
           return response()->json(['mensaje'=>'Datos invalidos o incompletos', 'status'=>'error'],422);
       }
    }
    
}
