<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolHasPermisos extends Model
{
    protected $table = 'rol_has_permisos';
    protected $primaryKey = 'id_rol_permiso';
    public $timestamps = false;

    protected $casts = [
        'rol_id_rol' => 'int',
        'permisos_id_permisos' => 'int'
    ];

    protected $fillable = [
        'rol_id_rol',
        'permisos_id_permisos'
    ];

    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'permisos_id_permisos');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id_rol');
    }
}
