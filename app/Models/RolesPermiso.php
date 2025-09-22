<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPermiso
 * 
 * @property int $id_usuario
 * @property string $primer_nombre
 * @property string $primer_apellido
 * @property string $tipo_rol
 * @property string $des_permisos
 *
 * @package App\Models
 */
class RolesPermiso extends Model
{
	protected $table = 'roles_permiso';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'id_usuario',
		'primer_nombre',
		'primer_apellido',
		'tipo_rol',
		'des_permisos'
	];
}
