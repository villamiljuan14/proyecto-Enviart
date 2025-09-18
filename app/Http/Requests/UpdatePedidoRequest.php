<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('pedido')->id_pedido;

        return [
            'estado_pedido'      => 'required|in:En transito,bodega,Entregado',
            'fecha_pedido'       => 'required|date',
            'novedades_id_novedad' => 'required|integer|exists:novedades,id_novedad',
            'pago_id_pago'       => 'required|integer|exists:pago,id_pago',
            'usuario_id_usuario' => 'required|integer|exists:usuarios,id_usuario',
        ];
    }
    public function messages()
    {
        return [
            'estado_pedido.required'      => 'El estado del pedido es obligatorio.',
            'estado_pedido.in'            => 'El estado del pedido debe ser En transito, bodega o Entregado.',
            'fecha_pedido.required'       => 'La fecha del pedido es obligatoria.',
            'fecha_pedido.date'           => 'La fecha del pedido no tiene un formato válido.',
            'novedades_id_novedad.required' => 'Debe asociar una novedad al pedido.',
            'novedades_id_novedad.exists' => 'La novedad seleccionada no existe.',
            'pago_id_pago.required'       => 'El pago asociado es obligatorio.',
            'pago_id_pago.exists'         => 'El pago seleccionado no existe.',
            'usuario_id_usuario.required' => 'El usuario es obligatorio.',
            'usuario_id_usuario.exists'   => 'El usuario seleccionado no existe.',
        ];
    }
}

        