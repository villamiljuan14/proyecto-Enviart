<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoDelPedido
 * 
 * @property string $PRIMER_NOMBRE_USUARIO
 * @property string $PRIMER_APELLIDO_USUARIO
 * @property int $ID_PEDIDO
 * @property string $ESTADO_PEDIDO
 * @property string $ESTADO_PAGO
 * @property string $METODO_DE_PAGO
 * @property string $DESCRIPCION_NOVEDAD
 * @property string $ESTADO_NOVEDAD
 *
 * @package App\Models
 */
class EstadoDelPedido extends Model
{
	protected $table = 'estado del pedido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_PEDIDO' => 'int'
	];

	protected $fillable = [
		'PRIMER_NOMBRE_USUARIO',
		'PRIMER_APELLIDO_USUARIO',
		'ID_PEDIDO',
		'ESTADO_PEDIDO',
		'ESTADO_PAGO',
		'METODO_DE_PAGO',
		'DESCRIPCION_NOVEDAD',
		'ESTADO_NOVEDAD'
	];
}
