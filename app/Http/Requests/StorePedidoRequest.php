<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'estado_pedido' => 'required|string|in:En transito,bodega,Entregado',
            'novedad' => 'nullable|string|max:255',
            'peso_pedido' => 'required|numeric|min:0',
            'largo_pedido' => 'required|numeric|min:0',
            'ancho_pedido' => 'required|numeric|min:0',
            'alto_pedido' => 'required|numeric|min:0',
            'fragil' => 'nullable|boolean',
            'pagos' => 'required|array|min:1',
            'pagos.*' => 'exists:pagos,id_pago',
        ];
    }

    public function messages()
    {
        return [
            'estado_pedido.required' => 'El estado del pedido es obligatorio.',
            'metodo_pago.required' => 'El método de pago es obligatorio.',
            'peso_pedido.required' => 'El peso es obligatorio.',
            'largo_pedido.required' => 'El largo es obligatorio.',
            'ancho_pedido.required' => 'El ancho es obligatorio.',
            'alto_pedido.required' => 'El alto es obligatorio.',
        ];
    }
}