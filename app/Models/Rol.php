<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rol
 * 
 * @property int $ID_ROL
 * @property string $TIPO_ROL
 * 
 * @property Collection|Permiso[] $permisos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */


class Rol extends Model
{
	protected $table = 'rol';
	protected $primaryKey = 'ID_ROL';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_ROL' => 'int'
	];

	protected $fillable = [
		'TIPO_ROL'
	];

	public function permisos()
	{
		return $this->belongsToMany(Permiso::class, 'rol_has_permisos', 'ROL_ID_ROL', 'PERMISOS_ID_PERMISOS')
					->withPivot('ID_ROL_PERMISO');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'ROL_ID_ROL');
	}
	
}
