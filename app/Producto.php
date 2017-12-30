<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

  protected $table = 'productos';
  public $timestamps = false;

  protected $fillable = [
      'nombre_producto', 'precio', 'caracteristicas'
  ];
}
