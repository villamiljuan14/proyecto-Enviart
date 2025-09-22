<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ruta
 * 
 * @property int $id_ruta
 * @property Carbon $fecha_ruta
 * @property string|null $descripcion_ruta
 * @property int $usuarios_id_usuario
 * @property int $vehiculos_id_vehiculo
 * @property int $direccion_id_direccion
 * 
 * @property Usuario $usuario
 * @property Vehiculo $vehiculo
 * @property Direccione $direccione
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Ruta extends Model
{
	protected $table = 'rutas';
	protected $primaryKey = 'id_ruta';
	public $timestamps = false;

	protected $casts = [
		'fecha_ruta' => 'datetime',
		'usuarios_id_usuario' => 'int',
		'vehiculos_id_vehiculo' => 'int',
		'direccion_id_direccion' => 'int'
	];

	protected $fillable = [
		'fecha_ruta',
		'descripcion_ruta',
		'usuarios_id_usuario',
		'vehiculos_id_vehiculo',
		'direccion_id_direccion'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id_usuario');
	}

	public function vehiculo()
	{
		return $this->belongsTo(Vehiculo::class, 'vehiculos_id_vehiculo');
	}

	public function direccione()
	{
		return $this->belongsTo(Direccione::class, 'direccion_id_direccion');
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'pedido_has_rutas', 'ruta_id_ruta', 'pedido_id_pedido')
					->withPivot('id_ruta_pedido');
	}
}
