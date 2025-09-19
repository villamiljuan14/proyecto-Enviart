<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('usuario')->id_usuario;
        return [
            'doc_usuario' => [
                'required',
                'string',
                'max:45',
                Rule::unique('usuarios', 'doc_usuario')->ignore($id, 'id_usuario'),
            ],
            'tipo_documento' => 'required|in:CE,TI,CC',
            'contrasena_usuario' => 'nullable|string|max:100',
            'email_usuario' => [
                'required',
                'email',
                'max:100',
                Rule::unique('usuarios', 'email_usuario')->ignore($id, 'id_usuario'),
            ],
            'primer_nombre' => 'required|string|max:80',
            'segundo_nombre' => 'nullable|string|max:80',
            'primer_apellido' => 'required|string|max:80',
            'segundo_apellido' => 'nullable|string|max:80',
            'telefono_usuario' => 'required|string|max:20',
            'estado_usuario' => 'required|boolean',
            'rol_id_rol' => 'required|integer|exists:roles,id_rol',
        ];
    }

    public function messages()
    {
        return [
            'doc_usuario.required' => 'El documento de usuario es obligatorio.',
            'doc_usuario.unique' => 'Este documento ya está registrado.',
            'tipo_documento.required' => 'El tipo de documento es obligatorio.',
            'tipo_documento.in' => 'El tipo de documento debe ser CE, TI o CC.',
            'email_usuario.required' => 'El correo electrónico es obligatorio.',
            'email_usuario.email' => 'Debe ingresar un correo válido.',
            'email_usuario.unique' => 'Este correo ya está registrado.',
            'primer_nombre.required' => 'El primer nombre es obligatorio.',
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'telefono_usuario.required' => 'El número de teléfono es obligatorio.',
            'rol_id_rol.required' => 'El rol es obligatorio.',
            'rol_id_rol.exists' => 'El rol seleccionado no es válido.',
        ];
    }
}
