<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class Novedades extends Model
{
    protected $table = 'novedades';
    protected $primaryKey = 'id_novedad';

    protected $casts = [
        'fecha_novedad' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $fillable = [
        'descripcion_novedad',
        'fecha_novedad',
        'estado_novedad'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'novedades_id_novedad', 'id_novedad');
    }
}
