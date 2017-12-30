<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PedidosProductos extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('pedidos_productos', function (Blueprint $table) {
          $table->increments('id');
          
          $table->integer('pedido_id')->unsigned();
          $table->foreign('pedido_id')
          ->references('id')->on('pedidos')
          ->onDelete('cascade')->onUpdate('cascade');

          $table->integer('producto_id')->unsigned();
          $table->foreign('producto_id')
          ->references('id')->on('productos')
          ->onDelete('cascade')->onUpdate('cascade');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('pedidos_productos');
  }
}
