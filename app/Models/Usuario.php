<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'estado_usuario' => 'int',
        'rol_id_rol' => 'int'
    ];

    protected $fillable = [
        'doc_usuario',
        'tipo_documento',
        'contrasena_usuario',
        'email_usuario',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'telefono_usuario',
        'estado_usuario',
        'rol_id_rol'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id_rol');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id_usuario');
    }
}
