<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class estado_pedido extends Model
{
    protected $table = 'estado del pedido';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'id_pedido' => 'int'
    ];

    protected $fillable = [
        'primer_nombre_usuario',
        'primer_apellido_usuario',
        'id_pedido',
        'estado_pedido',
        'estado_pago',
        'metodo_de_pago',
        'descripcion_novedad',
        'estado_novedad'
    ];
}
