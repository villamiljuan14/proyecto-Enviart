<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'estado_pedido' => 'required|string|in:En transito,bodega,Entregado',
            'id_direccion_origen' => 'required|exists:direcciones,id_direccion',
            'id_direccion_destino' => 'required|exists:direcciones,id_direccion',
            'novedad' => 'nullable|string|max:255',
            'pagos' => 'required|array',
            'pagos.*' => 'integer|exists:pagos,id_pago',
            'peso_pedido' => 'required|numeric|min:0',
            'largo_pedido' => 'required|numeric|min:0',
            'ancho_pedido' => 'required|numeric|min:0',
            'alto_pedido' => 'required|numeric|min:0',
            'fragil' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'estado_pedido.required' => 'El estado del pedido es obligatorio.',
            'id_direccion_origen.required' => 'La dirección de origen es obligatoria.',
            'id_direccion_origen.exists' => 'La dirección de origen seleccionada no es válida.',
            'id_direccion_destino.required' => 'La dirección de destino es obligatoria.',
            'id_direccion_destino.exists' => 'La dirección de destino seleccionada no es válida.',
            'pagos.required' => 'Debes seleccionar al menos un método de pago.',
            'peso_pedido.required' => 'El peso es obligatorio.',
            'largo_pedido.required' => 'El largo es obligatorio.',
            'ancho_pedido.required' => 'El ancho es obligatorio.',
            'alto_pedido.required' => 'El alto es obligatorio.',

        ];
    }
}
