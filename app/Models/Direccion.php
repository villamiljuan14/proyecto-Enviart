<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccion
 * 
 * @property int $id_direccion
 * @property string $tipo_origen
 * @property string $calle_dir
 * @property string $carrera_dir
 * @property string $numero_dir
 * @property string $barrio_dir
 * @property string $codigo_postal
 * @property string $cuidad
 * @property string $departamento
 * @property string|null $punto_referencia
 * @property int $usuarios_id_usuario
 * 
 * @property Usuario $usuario
 * @property Collection|Ruta[] $rutas
 * @property Collection|Pedido[] $pedidosOrigen
 * @property Collection|Pedido[] $pedidosDestino
 *
 * @package App\Models
 */
class Direccion extends Model
{
    protected $table = 'direcciones';
    protected $primaryKey = 'id_direccion';
    public $timestamps = false;

    protected $casts = [
        'usuarios_id_usuario' => 'int',
    ];

    protected $fillable = [
        'tipo_origen',
        'calle_dir',
        'carrera_dir',
        'numero_dir',
        'barrio_dir',
        'codigo_postal',
        'cuidad',
        'departamento',
        'punto_referencia',
        'usuarios_id_usuario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuarios_id_usuario');
    }

    public function rutas()
    {
        return $this->hasMany(Ruta::class, 'direccion_id_direccion');
    }


    public function pedidosOrigen()
    {
        return $this->hasMany(Pedido::class, 'id_direccion_origen');
    }
    public function pedidosDestino()
    {
        return $this->hasMany(Pedido::class, 'id_direccion_destino');
    }
}
