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
 * @property int $ID_USUARIO
 * @property string $DOC_USUARIO
 * @property string $TIPO_DOCUMENTO
 * @property string $CONTRASENA_USUARIO
 * @property string $EMAIL_USUARIO
 * @property string $PRIMER_NOMBRE_USUARIO
 * @property string $SEGUNDO_NOMBRE_USUARIO
 * @property string $PRIMER_APELLIDO_USUARIO
 * @property string $SEGUNDO_APELLIDO_USUARIO
 * @property string $NUMERO_TELEFONO_USUARIO
 * @property Carbon $CREATED_AT
 * @property Carbon $UPDATE_AT
 * @property int $ESTADO_USUARIO
 * @property int $ROL_ID_ROL
 * 
 * @property Rol $rol
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'ID_USUARIO';
	public $timestamps = false;

	protected $casts = [
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime',
		'ESTADO_USUARIO' => 'int',
		'ROL_ID_ROL' => 'int'
	];

	protected $fillable = [
		'DOC_USUARIO',
		'TIPO_DOCUMENTO',
		'CONTRASENA_USUARIO',
		'EMAIL_USUARIO',
		'PRIMER_NOMBRE_USUARIO',
		'SEGUNDO_NOMBRE_USUARIO',
		'PRIMER_APELLIDO_USUARIO',
		'SEGUNDO_APELLIDO_USUARIO',
		'NUMERO_TELEFONO_USUARIO',
		'CREATED_AT',
		'UPDATE_AT',
		'ESTADO_USUARIO',
		'ROL_ID_ROL'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'ROL_ID_ROL');
	}

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'USUARIO_ID_USUARIO');
	}
}
