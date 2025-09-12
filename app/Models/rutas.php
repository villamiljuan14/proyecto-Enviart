<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class rutas extends Model
{
    protected $table = 'rutas'; 
    protected $primaryKey = 'id_ruta'; 
    public $timestamps = false;

    protected $casts = [
        'direccion_id_direccion' => 'int'
    ];

    protected $fillable = [
        'direccion_id_direccion'
    ];

    public function direccion()
    {
        return $this->belongsTo(Direccione::class, 'direccion_id_direccion', 'id_direccion');
    }

    public function pedido_has_ruta()
    {
        return $this->hasMany(PedidoHasRutum::class, 'ruta_id_ruta', 'id_ruta');
    }
}
