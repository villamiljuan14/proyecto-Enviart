<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    protected $table = 'direcciones';
    protected $primaryKey = 'id_direccion';
    public $timestamps = false;

    protected $fillable = [
        'calle_dir',
        'carrera_dir',
        'barrio_dir',
        'codigo_postal',
        'localidad_dir',
        'origen_dir',
        'destino_dir'
    ];

    public function rutas()
    {
        return $this->hasMany(Ruta::class, 'direccion_id_direccion', 'id_direccion');
    }
}
