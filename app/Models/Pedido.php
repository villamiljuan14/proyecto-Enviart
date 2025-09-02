<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $ID_PEDIDO
 * @property string $ESTADO_PEDIDO
 * @property Carbon $FECHA_PEDIDO
 * @property int $NOVEDADES_ID_NOVEDAD
 * @property int $PAGO_ID_PAGO
 * @property int $USUARIO_ID_USUARIO
 * 
 * @property Usuario $usuario
 * @property Pago $pago
 * @property Novedade $novedade
 * @property Collection|PedidoHasRutum[] $pedido_has_ruta
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	protected $primaryKey = 'ID_PEDIDO';
	public $timestamps = false;

	protected $casts = [
		'FECHA_PEDIDO' => 'datetime',
		'NOVEDADES_ID_NOVEDAD' => 'int',
		'PAGO_ID_PAGO' => 'int',
		'USUARIO_ID_USUARIO' => 'int'
	];

	protected $fillable = [
		'ESTADO_PEDIDO',
		'FECHA_PEDIDO',
		'NOVEDADES_ID_NOVEDAD',
		'PAGO_ID_PAGO',
		'USUARIO_ID_USUARIO'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'USUARIO_ID_USUARIO');
	}

	public function pago()
	{
		return $this->belongsTo(Pago::class, 'PAGO_ID_PAGO');
	}

	public function novedade()
	{
		return $this->belongsTo(Novedade::class, 'NOVEDADES_ID_NOVEDAD');
	}

	public function pedido_has_ruta()
	{
		return $this->hasMany(PedidoHasRutum::class, 'PEDIDO_ID_PEDIDO');
	}
}
