<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id_rol
 * @property string $tipo_rol
 * 
 * @property Collection|RolHasPermiso[] $rol_has_permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'id_rol';
	public $timestamps = false;

	protected $fillable = [
		'tipo_rol'
	];

	public function rol_has_permisos()
	{
		return $this->hasMany(RolHasPermiso::class, 'rol_id_rol');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'rol_id_rol');
	}
}
