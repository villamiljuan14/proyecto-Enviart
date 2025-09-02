<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehiculo
 * 
 * @property int $ID_VEHICULO
 * @property string $TIPO_VEHICULO
 * @property string $MARCA_VEHICULO
 * @property string $MODELO_VEHICULO
 * @property int $AÑO_VEHICULO
 * @property string $PLACA_VEHICULO
 * @property string $CAPACIDAD_CARGA
 * @property string $ESTADO_VEHICULO
 *
 * @package App\Models
 */
class Vehiculo extends Model
{
	protected $table = 'vehiculos';
	protected $primaryKey = 'ID_VEHICULO';
	public $timestamps = false;

	protected $casts = [
		'AÑO_VEHICULO' => 'int'
	];

	protected $fillable = [
		'TIPO_VEHICULO',
		'MARCA_VEHICULO',
		'MODELO_VEHICULO',
		'AÑO_VEHICULO',
		'PLACA_VEHICULO',
		'CAPACIDAD_CARGA',
		'ESTADO_VEHICULO'
	];
}
