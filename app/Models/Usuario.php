<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id_usuario
 * @property string $doc_usuario
 * @property string $tipo_documento
 * @property string $contrasena_usuario
 * @property string $email_usuario
 * @property string $primer_nombre
 * @property string|null $segundo_nombre
 * @property string $primer_apellido
 * @property string|null $segundo_apellido
 * @property string $telefono_usuario
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $estado_usuario
 * @property int $rol_id_rol
 * 
 * @property Role $role
 * @property Collection|Direccione[] $direcciones
 * @property Collection|Noguia[] $noguias
 * @property Collection|Pago[] $pagos
 * @property Collection|Pedido[] $pedidos
 * @property Collection|Ruta[] $rutas
 * @property Collection|Vehiculo[] $vehiculos
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'id_usuario';

	protected $casts = [
		'estado_usuario' => 'int',
		'rol_id_rol' => 'int'
	];

	protected $fillable = [
		'doc_usuario',
		'tipo_documento',
		'contrasena_usuario',
		'email_usuario',
		'primer_nombre',
		'segundo_nombre',
		'primer_apellido',
		'segundo_apellido',
		'telefono_usuario',
		'estado_usuario',
		'rol_id_rol'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'rol_id_rol');
	}

	public function direcciones()
	{
		return $this->hasMany(Direccione::class, 'usuarios_id_usuario');
	}

	public function noguias()
	{
		return $this->hasMany(Noguia::class, 'usuarios_id_usuario');
	}

	public function pagos()
	{
		return $this->hasMany(Pago::class, 'usuarios_id_usuario');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'usuario_id_usuario');
	}

	public function rutas()
	{
		return $this->hasMany(Ruta::class, 'usuarios_id_usuario');
	}

	public function vehiculos()
	{
		return $this->hasMany(Vehiculo::class, 'usuarios_id_usuario');
	}
}
