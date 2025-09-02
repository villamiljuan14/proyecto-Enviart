<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccion
 * 
 * @property int $ID_DIRECCION
 * @property string|null $CALLE_DIR
 * @property string|null $CARRERA_DIR
 * @property string|null $BARRIO_DIR
 * @property string|null $CODIGO_POSTAL
 * @property string|null $LOCALIDAD_DIR
 * @property string|null $ORIGEN_DIRECCION
 * @property string|null $DESTINO_DIRECCION
 * 
 * @property Collection|Rutum[] $ruta
 *
 * @package App\Models
 */
class Direccion extends Model
{
	protected $table = 'direccion';
	protected $primaryKey = 'ID_DIRECCION';
	public $timestamps = false;

	protected $fillable = [
		'CALLE_DIR',
		'CARRERA_DIR',
		'BARRIO_DIR',
		'CODIGO_POSTAL',
		'LOCALIDAD_DIR',
		'ORIGEN_DIRECCION',
		'DESTINO_DIRECCION'
	];

	public function ruta()
	{
		return $this->hasMany(Rutum::class, 'DIRECCION_ID_DIRECCION');
	}
}
