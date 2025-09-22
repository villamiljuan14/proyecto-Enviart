<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 * 
 * @property int $id_vehiculo
 * @property string $tipo_vehiculo
 * @property string $marca_vehiculo
 * @property string $modelo_vehiculo
 * @property int $año_vehiculo
 * @property string $placa_vehiculo
 * @property string $capacidad_carga
 * @property string $estado_vehiculo
 * @property int $usuarios_id_usuario
 * 
 * @property Usuario $usuario
 * @property Collection|Ruta[] $rutas
 *
 * @package App\Models
 */
class Vehiculo extends Model
{
	protected $table = 'vehiculos';
	protected $primaryKey = 'id_vehiculo';
	public $timestamps = false;

	protected $casts = [
		'año_vehiculo' => 'int',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'tipo_vehiculo',
		'marca_vehiculo',
		'modelo_vehiculo',
		'año_vehiculo',
		'placa_vehiculo',
		'capacidad_carga',
		'estado_vehiculo',
		'usuarios_id_usuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id_usuario');
	}

	public function rutas()
	{
		return $this->hasMany(Ruta::class, 'vehiculos_id_vehiculo');
	}
}
