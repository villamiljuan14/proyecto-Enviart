<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey = 'id_vehiculo';
    public $timestamps = false;

    protected $casts = [
        'año_vehiculo' => 'int'
    ];

    protected $fillable = [
        'tipo_vehiculo',
        'marca_vehiculo',
        'modelo_vehiculo',
        'año_vehiculo',
        'placa_vehiculo',
        'capacidad_carga',
        'estado_vehiculo'
    ];
}
