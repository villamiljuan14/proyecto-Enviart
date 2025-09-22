<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NovedadesHasPedido
 * 
 * @property int $id_pedido_novedad
 * @property int $novedades_id_novedad
 * @property int $pedidos_id_pedido
 * @property string $observacion_pedido
 * @property Carbon $fecha_registro
 * 
 * @property Novedade $novedade
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class NovedadesHasPedido extends Model
{
	protected $table = 'novedades_has_pedidos';
	protected $primaryKey = 'id_pedido_novedad';
	public $timestamps = false;

	protected $casts = [
		'novedades_id_novedad' => 'int',
		'pedidos_id_pedido' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'novedades_id_novedad',
		'pedidos_id_pedido',
		'observacion_pedido',
		'fecha_registro'
	];

	public function novedade()
	{
		return $this->belongsTo(Novedade::class, 'novedades_id_novedad');
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'pedidos_id_pedido');
	}
}
