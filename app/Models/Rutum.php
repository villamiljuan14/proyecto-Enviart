<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rutum
 * 
 * @property int $ID_RUTA
 * @property int $DIRECCION_ID_DIRECCION
 * 
 * @property Direccion $direccion
 * @property Collection|PedidoHasRutum[] $pedido_has_ruta
 *
 * @package App\Models
 */
class Rutum extends Model
{
	protected $table = 'ruta';
	protected $primaryKey = 'ID_RUTA';
	public $timestamps = false;

	protected $casts = [
		'DIRECCION_ID_DIRECCION' => 'int'
	];

	protected $fillable = [
		'DIRECCION_ID_DIRECCION'
	];

	public function direccion()
	{
		return $this->belongsTo(Direccion::class, 'DIRECCION_ID_DIRECCION');
	}

	public function pedido_has_ruta()
	{
		return $this->hasMany(PedidoHasRutum::class, 'RUTA_ID_RUTA');
	}
}
