<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permiso
 * 
 * @property int $id_permisos
 * @property string $des_permisos
 * 
 * @property Collection|RolHasPermiso[] $rol_has_permisos
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	protected $primaryKey = 'id_permisos';
	public $timestamps = false;

	protected $fillable = [
		'des_permisos'
	];

	public function rol_has_permisos()
	{
		return $this->hasMany(RolHasPermiso::class, 'permisos_id_permisos');
	}
}
