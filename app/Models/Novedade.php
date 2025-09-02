<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Novedade
 * 
 * @property int $ID_NOVEDAD
 * @property string $DESCRIPCION_NOVEDAD
 * @property Carbon $FECHA_NOVEDAD
 * @property string $ESTADO_NOVEDAD
 * @property Carbon|null $CREATED_AT
 * @property Carbon|null $UPDATE_AT
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Novedade extends Model
{
	protected $table = 'novedades';
	protected $primaryKey = 'ID_NOVEDAD';
	public $timestamps = false;

	protected $casts = [
		'FECHA_NOVEDAD' => 'datetime',
		'CREATED_AT' => 'datetime',
		'UPDATE_AT' => 'datetime'
	];

	protected $fillable = [
		'DESCRIPCION_NOVEDAD',
		'FECHA_NOVEDAD',
		'ESTADO_NOVEDAD',
		'CREATED_AT',
		'UPDATE_AT'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'NOVEDADES_ID_NOVEDAD');
	}
}
