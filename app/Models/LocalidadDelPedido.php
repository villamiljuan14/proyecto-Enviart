<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LocalidadDelPedido
 * 
 * @property int $ID_PEDIDO
 * @property string $PRIMER_NOMBRE_USUARIO
 * @property int $ID_RUTA
 * @property string|null $LOCALIDAD_DIR
 *
 * @package App\Models
 */
class LocalidadDelPedido extends Model
{
	protected $table = 'localidad del pedido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PEDIDO' => 'int',
		'ID_RUTA' => 'int'
	];

	protected $fillable = [
		'ID_PEDIDO',
		'PRIMER_NOMBRE_USUARIO',
		'ID_RUTA',
		'LOCALIDAD_DIR'
	];
}
