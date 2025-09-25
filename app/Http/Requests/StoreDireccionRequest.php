<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDireccionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tipo_origen' => 'required|in:Origen,Destino',
            'calle_dir' => 'required|string|max:100',
            'carrera_dir' => 'required|string|max:100',
            'numero_dir' => 'required|string|max:45',
            'barrio_dir' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:8',
            'cuidad' => 'required|string|max:45',
            'departamento' => 'required|string|max:45',
            'punto_referencia' => 'nullable|string|max:45',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'tipo_origen.required' => 'El tipo de dirección es obligatorio.',
            'tipo_origen.in' => 'El tipo de dirección debe ser Origen o Destino.',
            'calle_dir.required' => 'La calle es obligatoria.',
            'calle_dir.max' => 'La calle no debe exceder los 100 caracteres.',
            'carrera_dir.required' => 'La carrera es obligatoria.',
            'carrera_dir.max' => 'La carrera no debe exceder los 100 caracteres.',
            'numero_dir.required' => 'El número es obligatorio.',
            'numero_dir.max' => 'El número no debe exceder los 45 caracteres.',
            'barrio_dir.required' => 'El barrio es obligatorio.',
            'barrio_dir.max' => 'El barrio no debe exceder los 100 caracteres.',
            'codigo_postal.required' => 'El código postal es obligatorio.',
            'codigo_postal.max' => 'El código postal no debe exceder los 8 caracteres.',
            'cuidad.required' => 'La ciudad es obligatoria.',
            'cuidad.max' => 'La ciudad no debe exceder los 45 caracteres.',
            'departamento.required' => 'El departamento es obligatorio.',
            'departamento.max' => 'El departamento no debe exceder los 45 caracteres.',
            'punto_referencia.max' => 'El punto de referencia no debe exceder los 45 caracteres.',
        ];
    }
}