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
 * @property int $ID_PAGO
 * @property string $ESTADO_PAGO
 * @property string $METODO_DE_PAGO
 * @property Carbon $FECHA_PAGO
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Pago extends Model
{
	protected $table = 'pago';
	protected $primaryKey = 'ID_PAGO';
	public $timestamps = false;

	protected $casts = [
		'FECHA_PAGO' => 'datetime'
	];

	protected $fillable = [
		'ESTADO_PAGO',
		'METODO_DE_PAGO',
		'FECHA_PAGO'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'PAGO_ID_PAGO');
	}
}
