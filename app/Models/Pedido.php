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
 * @property int $id_pedido
 * @property string $estado_pedido
 * @property Carbon $fecha_pedido
 * @property int $usuario_id_usuario
 * @property float $peso_pedido
 * @property float $largo_pedido
 * @property float $alto_pedido
 * @property float $ancho_pedido
 * @property bool $fragil
 * @property int|null $direccion_origen_id
 * @property int|null $direccion_destino_id
 * 
 * @property Usuario $usuario
 * @property Direccion|null $direccionOrigen
 * @property Direccion|null $direccionDestino
 * @property Collection|Noguia[] $noguias
 * @property Collection|Novedad[] $novedades
 * @property Collection|Pago[] $pagos
 * @property Collection|Ruta[] $rutas
 *
 * @package App\Models
 */
class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;

    protected $casts = [
        'fecha_pedido' => 'datetime',
        'usuario_id_usuario' => 'int',
        'peso_pedido' => 'float',
        'largo_pedido' => 'float',
        'alto_pedido' => 'float',
        'ancho_pedido' => 'float',
        'fragil' => 'bool',
        'direccion_origen_id' => 'int',
        'direccion_destino_id' => 'int',
    ];

    protected $fillable = [
        'estado_pedido',
        'fecha_pedido',
        'usuario_id_usuario',
        'peso_pedido',
        'largo_pedido',
        'alto_pedido',
        'ancho_pedido',
        'fragil',
        'direccion_origen_id',
        'direccion_destino_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id_usuario');
    }

    // ✅ Relación con la dirección de origen
    public function direccionOrigen()
    {
        return $this->belongsTo(Direccion::class, 'direccion_origen_id');
    }

    // ✅ Relación con la dirección de destino (opcional, pero común en pedidos)
    public function direccionDestino()
    {
        return $this->belongsTo(Direccion::class, 'direccion_destino_id');
    }

    public function noguias()
    {
        return $this->belongsToMany(Noguia::class, 'noguias_has_pedidos', 'pedidos_id_pedido', 'noguias_id_no_guia')
            ->withPivot('id_guia_pedido');
    }

    public function novedades()
    {
        return $this->belongsToMany(Novedad::class, 'novedades_has_pedidos', 'pedidos_id_pedido', 'novedades_id_novedad')
            ->withPivot('id_pedido_novedad', 'observacion_pedido', 'fecha_registro');
    }

    public function pagos()
    {
        return $this->belongsToMany(
            Pago::class,
            'pagos_has_pedidos',
            'pedidos_id_pedido',
            'pagos_id_pago'
        );
    }

    public function rutas()
    {
        return $this->belongsToMany(Ruta::class, 'pedido_has_rutas', 'pedido_id_pedido', 'ruta_id_ruta')
            ->withPivot('id_ruta_pedido');
    }
}