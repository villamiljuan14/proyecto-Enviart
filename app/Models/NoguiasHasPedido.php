<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NoguiasHasPedido
 * 
 * @property int $id_guia_pedido
 * @property int $noguias_id_no_guia
 * @property int $pedidos_id_pedido
 * 
 * @property Noguia $noguia
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class NoguiasHasPedido extends Model
{
	protected $table = 'noguias_has_pedidos';
	protected $primaryKey = 'id_guia_pedido';
	public $timestamps = false;

	protected $casts = [
		'noguias_id_no_guia' => 'int',
		'pedidos_id_pedido' => 'int'
	];

	protected $fillable = [
		'noguias_id_no_guia',
		'pedidos_id_pedido'
	];

	public function noguia()
	{
		return $this->belongsTo(Noguia::class, 'noguias_id_no_guia');
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'pedidos_id_pedido');
	}
}
