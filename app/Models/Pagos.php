<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class Pagos extends Model
{
    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';
    public $timestamps = false;

    protected $casts = [
        'fecha_pago' => 'datetime'
    ];

    protected $fillable = [
        'estado_pago',
        'metodo_de_pago',
        'fecha_pago'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'pago_id_pago', 'id_pago');
    }
}
