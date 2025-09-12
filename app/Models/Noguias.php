<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Noguia extends Model
{
    protected $table = 'noguias';
    protected $primaryKey = 'id_no_guia';

    protected $casts = [
        'direccion_id_direccion' => 'int',
        'usuario_id_usuario' => 'int',
        'pedido_id_pedido' => 'int',
        'fecha_de_entrega_estimada' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $fillable = [
        'estado_guia',
        'direccion_id_direccion',
        'usuario_id_usuario',
        'pedido_id_pedido',
        'fecha_de_entrega_estimada',
        'firma_entrega',
        'evidencia_entrega'
    ];
}
