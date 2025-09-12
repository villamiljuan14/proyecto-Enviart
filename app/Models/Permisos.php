<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Permisos extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'id_permisos';
    public $incrementing = true;
    public $timestamps = false;

    protected $casts = [
        'id_permisos' => 'int'
    ];

    protected $fillable = [
        'des_permisos'
    ];

    public function roles()
    {
        return $this->belongsToMany(
            Rol::class,
            'rol_has_permisos',
            'permisos_id_permisos',
            'rol_id_rol'
        )->withPivot('id_rol_permiso');
    }
}
