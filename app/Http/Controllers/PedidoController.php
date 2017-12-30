<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Cliente;
use App\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
  public function dashboard()
  {

      $pedidos=Cache::remember('pedidos', 5, function () {
          return DB::table('pedidos')
                  ->latest()->take(2)->get();
      });

      return response()->json(['pedidos'=>$pedidos],202);
  }

  public function index()
  {
      $query= new Pedido;
      $pedidos = $query->pedidos();
      $clientes=Cliente::all();
      $productos=Producto::all();

      return response()->json([
        'pedidos'=>$pedidos,
        'clientes'=>$clientes,
        'productos'=>$productos,
      ],202);
  }

  public function store(Request $request)
  {

    if (!$request->input('cliente_dni') || !$request->input('producto_id') )
    {
          return response()->json(['mensaje'=>'Datos invalidos o incompletos', 'status'=>'error'],422);
    }else {
      $dni_explode=explode("-",$request->cliente_dni);
      $dni=$dni_explode[0];
      $cantidad = sizeof($request->producto_id);

      $pedido = new Pedido;
      $pedido->cliente_dni = $dni;
      $pedido->cantidad = $cantidad;
      $pedido->save();

      $pedido_id = $pedido->id;
      $producto_id=$request->producto_id;

      for ($i=0; $i < $cantidad; $i++) {
        DB::table('pedidos_productos')->insert(
          ['pedido_id' => $pedido_id, 'producto_id' =>$producto_id[$i] ]
        );
      }

      return response()->json(['mensaje'=>'Se ha creado el pedido','status'=>'ok'],202);
    }
  }

  public function show($id)
    {
      $query= new Pedido;
      $pedido = $query->inf_pedido($id);

        return response()->json(['datos'=>$pedido,'status'=>'ok'],202);
    }


}
