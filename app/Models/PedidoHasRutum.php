<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoHasRutum
 * 
 * @property int $ID_RUTA_PEDIDO
 * @property int $PEDIDO_ID_PEDIDO
 * @property int $RUTA_ID_RUTA
 * 
 * @property Rutum $rutum
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class PedidoHasRutum extends Model
{
	protected $table = 'pedido_has_ruta';
	protected $primaryKey = 'ID_RUTA_PEDIDO';
	public $timestamps = false;

	protected $casts = [
		'PEDIDO_ID_PEDIDO' => 'int',
		'RUTA_ID_RUTA' => 'int'
	];

	protected $fillable = [
		'PEDIDO_ID_PEDIDO',
		'RUTA_ID_RUTA'
	];

	public function rutum()
	{
		return $this->belongsTo(Rutum::class, 'RUTA_ID_RUTA');
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'PEDIDO_ID_PEDIDO');
	}
}
