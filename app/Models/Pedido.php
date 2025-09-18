<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;

    protected $casts = [
        'fecha_pedido' => 'datetime',
        'novedades_id_novedad' => 'int',
        'pago_id_pago' => 'int',
        'usuario_id_usuario' => 'int',
    ];

    protected $fillable = [
        'estado_pedido',
        'fecha_pedido',
        'novedades_id_novedad',
        'pago_id_pago',
        'usuario_id_usuario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id_usuario', 'id_usuario');
    }

    public function pago()
    {
        return $this->belongsTo(Pago::class, 'pago_id_pago', 'id_pago');
    }

    public function novedad()
    {
        return $this->belongsTo(Novedad::class, 'novedades_id_novedad', 'id_novedad');
    }

    public function pedido_has_rutas()
    {
        return $this->hasMany(PedidoHasRuta::class, 'pedido_id_pedido', 'id_pedido');
    }
}

