<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Noguium
 * 
 * @property int $ID_No_GUIA
 * @property string|null $ESTADO_GUIA
 * @property int $DIRECCION_ID_DIRECCION
 * @property int $USUARIO_ID_USUARIO
 * @property int $PEDIDO_ID_PEDIDO
 * @property Carbon|null $FECHA_DE_ENTREGA_ESTIMADA
 * @property string|null $FIRMA_ENTREGA
 * @property string|null $EVIDENCIA_ENTREGA
 * @property Carbon|null $CREATED_AT
 * @property Carbon|null $UPDATE_AT
 *
 * @package App\Models
 */
class Noguium extends Model
{
	protected $table = 'noguia';
	protected $primaryKey = 'ID_No_GUIA';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_No_GUIA' => 'int',
		'DIRECCION_ID_DIRECCION' => 'int',
		'USUARIO_ID_USUARIO' => 'int',
		'PEDIDO_ID_PEDIDO' => 'int',
		'FECHA_DE_ENTREGA_ESTIMADA' => 'datetime',
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime'
	];

	protected $fillable = [
		'ESTADO_GUIA',
		'DIRECCION_ID_DIRECCION',
		'USUARIO_ID_USUARIO',
		'PEDIDO_ID_PEDIDO',
		'FECHA_DE_ENTREGA_ESTIMADA',
		'FIRMA_ENTREGA',
		'EVIDENCIA_ENTREGA',
		'CREATED_AT',
		'UPDATE_AT'
	];
}
