<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PagosHasPedido
 * 
 * @property int $id_pago_pedido
 * @property int $pagos_id_pago
 * @property int $pedidos_id_pedido
 * 
 * @property Pago $pago
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class PagosHasPedido extends Model
{
	protected $table = 'pagos_has_pedidos';
	protected $primaryKey = 'id_pago_pedido';
	public $timestamps = false;

	protected $casts = [
		'pagos_id_pago' => 'int',
		'pedidos_id_pedido' => 'int'
	];

	protected $fillable = [
		'pagos_id_pago',
		'pedidos_id_pedido'
	];

	public function pago()
	{
		return $this->belongsTo(Pago::class, 'pagos_id_pago');
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'pedidos_id_pedido');
	}
}
