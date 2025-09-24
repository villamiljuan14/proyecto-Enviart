<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVehiculoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tipo_vehiculo' => 'required|string|max:45',
            'marca_vehiculo' => 'required|string|max:45',
            'modelo_vehiculo' => 'required|string|max:45',
            'año_vehiculo' => 'nullable|integer|min:1900|max:2099',
            'placa_vehiculo' => 'required|string|max:45|unique:vehiculos,placa_vehiculo',
            'capacidad_carga' => 'nullable|string|max:45',
            'estado_vehiculo' => 'required|in:Activo,Inactivo',
            'usuarios_id_usuario' => 'nullable|exists:usuarios,id_usuario',
        ];
    }
}