<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolHasPermiso
 * 
 * @property int $ID_ROL_PERMISO
 * @property int $ROL_ID_ROL
 * @property int $PERMISOS_ID_PERMISOS
 * 
 * @property Permiso $permiso
 * @property Rol $rol
 *
 * @package App\Models
 */
class RolHasPermiso extends Model
{
	protected $table = 'rol_has_permisos';
	protected $primaryKey = 'ID_ROL_PERMISO';
	public $timestamps = false;

	protected $casts = [
		'ROL_ID_ROL' => 'int',
		'PERMISOS_ID_PERMISOS' => 'int'
	];

	protected $fillable = [
		'ROL_ID_ROL',
		'PERMISOS_ID_PERMISOS'
	];

	public function permiso()
	{
		return $this->belongsTo(Permiso::class, 'PERMISOS_ID_PERMISOS');
	}

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'ROL_ID_ROL');
	}
}
