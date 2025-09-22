<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'estado_pedido' => 'required|in:En transito,bodega,Entregado',
            'fecha_pedido' => 'required|date',
            'usuario_id_usuario' => 'required|integer|exists:usuarios,id_usuario',
            'novedades' => 'nullable|array',
            'novedades.*' => 'integer|exists:novedades,id_novedad',
            'pagos' => 'nullable|array',
            'pagos.*' => 'integer|exists:pagos,id_pago',
        ];
    }

    public function messages(): array
    {
        return [
            'estado_pedido.required' => 'El estado del pedido es obligatorio.',
            'estado_pedido.in' => 'El estado debe ser "En transito", "bodega" o "Entregado".',
            'fecha_pedido.required' => 'La fecha del pedido es obligatoria.',
            'fecha_pedido.date' => 'La fecha debe tener un formato válido.',
            'usuario_id_usuario.required' => 'Debe seleccionar un usuario.',
            'usuario_id_usuario.exists' => 'El usuario seleccionado no existe.',
            'novedades.*.exists' => 'Una de las novedades seleccionadas no existe.',
            'pagos.*.exists' => 'Uno de los pagos seleccionados no existe.',
        ];
    }
}


        