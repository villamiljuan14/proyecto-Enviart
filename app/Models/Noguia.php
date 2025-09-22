<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Noguia
 * 
 * @property int $id_no_guia
 * @property string $numero_guia
 * @property Carbon $fecha_guia
 * @property string $estado_guia
 * @property Carbon $fecha_de_entrega_estimada
 * @property string $firma_entrega
 * @property string $evidencia_entrega
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $usuarios_id_usuario
 * 
 * @property Usuario $usuario
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Noguia extends Model
{
	protected $table = 'noguias';
	protected $primaryKey = 'id_no_guia';

	protected $casts = [
		'fecha_guia' => 'datetime',
		'fecha_de_entrega_estimada' => 'datetime',
		'usuarios_id_usuario' => 'int'
	];

	protected $fillable = [
		'numero_guia',
		'fecha_guia',
		'estado_guia',
		'fecha_de_entrega_estimada',
		'firma_entrega',
		'evidencia_entrega',
		'usuarios_id_usuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuarios_id_usuario');
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'noguias_has_pedidos', 'noguias_id_no_guia', 'pedidos_id_pedido')
					->withPivot('id_guia_pedido');
	}
}
