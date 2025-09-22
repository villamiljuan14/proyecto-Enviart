<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Novedad
 * 
 * @property int $id_novedad
 * @property string $descripcion_novedad
 * @property Carbon $fecha_novedad
 * @property string $estado_novedad
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Novedad extends Model
{
	protected $table = 'novedades';
	protected $primaryKey = 'id_novedad';

	protected $casts = [
		'fecha_novedad' => 'datetime'
	];

	protected $fillable = [
		'descripcion_novedad',
		'fecha_novedad',
		'estado_novedad'
	];

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'novedades_has_pedidos', 'novedades_id_novedad', 'pedidos_id_pedido')
					->withPivot('id_pedido_novedad', 'observacion_pedido', 'fecha_registro');
	}
}
