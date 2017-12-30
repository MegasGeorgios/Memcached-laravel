<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $table = 'clientes';
    protected $primaryKey='dni';
    public $incrementing= false;
    protected $keyType= 'string';
    public $timestamps = false;

    protected $fillable = [
        'dni', 'nombre'
    ];
}
