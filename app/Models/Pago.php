<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 * 
 * @property int $id_pago
 * @property string $metodo_de_pago
 * @property float $monto_pago
 * @property string $moneda
 * @property string $estado_pago
 * @property Carbon $fecha_pago
 * @property string $referencia_pago
 * @property int $usuarios_id_usuario
 * 
 * @property Usuario $usuario
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Pago extends Model
{
	protected $table = 'pagos';
	protected $primaryKey = 'id_pago';
	public $timestamps = false;

	protected $casts = [
		'monto_pago' => 'float',
		'fecha_pago' => 'datetime',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'metodo_de_pago',
		'monto_pago',
		'moneda',
		'estado_pago',
		'fecha_pago',
		'referencia_pago',
		'usuarios_id_usuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id_usuario');
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'pagos_has_pedidos', 'pagos_id_pago', 'pedidos_id_pedido')
					->withPivot('id_pago_pedido');
	}
}
