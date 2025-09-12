<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesPermiso extends Model
{
    protected $table = 'roles_permiso'; 
    public $incrementing = false;       
    public $timestamps = false;         

    protected $casts = [
        'id_usuario' => 'int',
    ];

    protected $fillable = [
        'id_usuario',
        'primer_nombre',
        'primer_apellido',
        'tipo_rol',
        'des_permisos',
    ];
}
