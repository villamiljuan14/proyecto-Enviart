<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPermiso
 * 
 * @property int $ID_USUARIO
 * @property string $PRIMER_NOMBRE_USUARIO
 * @property string $PRIMER_APELLIDO_USUARIO
 * @property string $TIPO_ROL
 * @property string $DES_PERMISOS
 *
 * @package App\Models
 */
class RolesPermiso extends Model
{
	protected $table = 'roles permiso';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_USUARIO' => 'int'
	];

	protected $fillable = [
		'ID_USUARIO',
		'PRIMER_NOMBRE_USUARIO',
		'PRIMER_APELLIDO_USUARIO',
		'TIPO_ROL',
		'DES_PERMISOS'
	];
}
