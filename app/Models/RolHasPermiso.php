<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolHasPermiso
 * 
 * @property int $id_rol_permiso
 * @property int $rol_id_rol
 * @property int $permisos_id_permisos
 * 
 * @property Role $role
 * @property Permiso $permiso
 *
 * @package App\Models
 */
class RolHasPermiso extends Model
{
	protected $table = 'rol_has_permisos';
	protected $primaryKey = 'id_rol_permiso';
	public $timestamps = false;

	protected $casts = [
		'rol_id_rol' => 'int',
		'permisos_id_permisos' => 'int'
	];

	protected $fillable = [
		'rol_id_rol',
		'permisos_id_permisos'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'rol_id_rol');
	}

	public function permiso()
	{
		return $this->belongsTo(Permiso::class, 'permisos_id_permisos');
	}
}
