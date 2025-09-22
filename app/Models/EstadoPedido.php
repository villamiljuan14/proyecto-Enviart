<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoPedido
 * 
 * @property string $primer_nombre
 * @property string $primer_apellido
 * @property int $id_pedido
 * @property string $estado_pedido
 * @property string|null $estado_pago
 * @property string|null $metodo_de_pago
 * @property string|null $descripcion_novedad
 * @property string|null $estado_novedad
 *
 * @package App\Models
 */
class EstadoPedido extends Model
{
	protected $table = 'estado_pedido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int'
	];

	protected $fillable = [
		'primer_nombre',
		'primer_apellido',
		'id_pedido',
		'estado_pedido',
		'estado_pago',
		'metodo_de_pago',
		'descripcion_novedad',
		'estado_novedad'
	];
}
