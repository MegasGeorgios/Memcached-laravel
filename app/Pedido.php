<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'pedidos';

    public function pedidos(){
      $pedidos=DB::table('pedidos')
        ->join('clientes', 'clientes.dni', '=', 'pedidos.cliente_dni')
        ->select('pedidos.*', 'clientes.nombre')
        ->get();

      return $pedidos;
    }

    public function inf_pedido($id){
      $pedido=DB::table('pedidos')
        ->join('clientes', 'clientes.dni', '=', 'pedidos.cliente_dni')
        ->join('pedidos_productos', 'pedidos.id', '=', 'pedidos_productos.pedido_id')
        ->join('productos', 'productos.id', '=', 'pedidos_productos.producto_id')
        ->join('categorias', 'categorias.id', '=', 'productos.categoria_id')
        ->where('pedidos.id',$id)
        ->select(
          'clientes.nombre', 'clientes.dni',
          'pedidos.created_at', 'pedidos.cantidad',
          'pedidos_productos.pedido_id',
          'productos.nombre_producto', 'productos.precio', 'productos.caracteristicas',
          'categorias.nombre_categoria')
        ->get();

        return $pedido;
    }

}
