<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LocalidadPedido
 * 
 * @property int $id_pedido
 * @property string $primer_nombre
 * @property int $id_ruta
 * @property string $localidad_dir
 *
 * @package App\Models
 */
class LocalidadPedido extends Model
{
	protected $table = 'localidad_pedido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'id_ruta' => 'int'
	];

	protected $fillable = [
		'id_pedido',
		'primer_nombre',
		'id_ruta',
		'localidad_dir'
	];
}
