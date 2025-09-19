<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNovedadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_novedad'          => 'required|integer',
            'descripcion_novedad' => 'required|string|max:255',
            'fecha_novedad'       => 'required|date',
            'estado_novedad'      => 'required|in:0,1,2',

        ];
    }

    public function messages(): array
    {
        return [
            'id_novedad.required' => 'El ID de la novedad es obligatorio.',
            'id_novedad.integer'  => 'El ID de la novedad debe ser un número entero.',

            'descripcion_novedad.required' => 'La descripción de la novedad es obligatoria.',
            'descripcion_novedad.string'   => 'La descripción debe ser un texto.',
            'descripcion_novedad.max'      => 'La descripción no puede tener más de 255 caracteres.',

            'fecha_novedad.required' => 'La fecha de la novedad es obligatoria.',
            'fecha_novedad.date'     => 'La fecha debe ser una fecha válida.',

            'estado_novedad.required' => 'El estado de la novedad es obligatorio.',
            'estado_novedad.in'       => 'El estado debe ser válido (Pendiente, Resuelta o Cancelada).',
        ];
    }
}
