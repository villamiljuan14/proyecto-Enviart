<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class localidad_pedido extends Model
{
    protected $table = 'localidad del pedido';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'id_pedido' => 'int',
        'id_ruta' => 'int'
    ];

    protected $fillable = [
        'id_pedido',
        'primer_nombre_usuario',
        'id_ruta',
        'localidad_dir'
    ];
}
