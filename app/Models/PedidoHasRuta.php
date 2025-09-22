<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoHasRuta
 * 
 * @property int $id_ruta_pedido
 * @property int $pedido_id_pedido
 * @property int $ruta_id_ruta
 * 
 * @property Pedido $pedido
 * @property Ruta $ruta
 *
 * @package App\Models
 */
class PedidoHasRuta extends Model
{
	protected $table = 'pedido_has_rutas';
	protected $primaryKey = 'id_ruta_pedido';
	public $timestamps = false;

	protected $casts = [
		'pedido_id_pedido' => 'int',
		'ruta_id_ruta' => 'int'
	];

	protected $fillable = [
		'pedido_id_pedido',
		'ruta_id_ruta'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'pedido_id_pedido');
	}

	public function ruta()
	{
		return $this->belongsTo(Ruta::class, 'ruta_id_ruta');
	}
}
