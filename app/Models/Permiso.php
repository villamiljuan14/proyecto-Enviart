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
 * @property int $ID_PERMISOS
 * @property string $DES_PERMISOS
 * 
 * @property Collection|Rol[] $rols
 *
 * @package App\Models
 */
class Permiso extends Model
{
	protected $table = 'permisos';
	protected $primaryKey = 'ID_PERMISOS';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PERMISOS' => 'int'
	];

	protected $fillable = [
		'DES_PERMISOS'
	];

	public function rols()
	{
		return $this->belongsToMany(Rol::class, 'rol_has_permisos', 'PERMISOS_ID_PERMISOS', 'ROL_ID_ROL')
					->withPivot('ID_ROL_PERMISO');
	}
}
