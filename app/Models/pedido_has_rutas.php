<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pedido_has_rutas extends Model
{
    protected $table = 'pedido_has_ruta';
    protected $primaryKey = 'id_ruta_pedido';
    public $timestamps = false;

    protected $casts = [
        'pedido_id_pedido' => 'int',
        'ruta_id_ruta' => 'int'
    ];

    protected $fillable = [
        'pedido_id_pedido',
        'ruta_id_ruta'
    ];

    public function ruta()
    {
        return $this->belongsTo(Ruta::class, 'ruta_id_ruta', 'id_ruta');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id_pedido', 'id_pedido');
    }
}
