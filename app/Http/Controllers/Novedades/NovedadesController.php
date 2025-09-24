<?php

namespace App\Http\Controllers;

use App\Models\Novedad;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNovedadRequest;
use App\Http\Requests\UpdateNovedadRequest;

class NovedadesController extends Controller
{
    public function create()
    {
        $pedidos = Pedido::orderBy('id_pedido')->get();
        return view('novedades.form', compact('pedidos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion_novedad' => 'required|string|max:255',
            'fecha_novedad' => 'required|date_format:Y-m-d H:i:s',
            'estado_novedad' => 'required|in:PENDIENTE,RESUELTA,CANCELADA',
            'pedidos' => 'nullable|array',
            'pedidos.*' => 'exists:pedidos,id_pedido',
        ]);

        $novedad = Novedad::create([
            'descripcion_novedad' => $validated['descripcion_novedad'],
            'fecha_novedad' => $validated['fecha_novedad'],
            'estado_novedad' => $validated['estado_novedad'],
        ]);

        if (!empty($validated['pedidos'])) {
            foreach ($validated['pedidos'] as $pedidoId) {
                $observacion = $request->input("observacion_pedido.{$pedidoId}", null);
                $novedad->pedidos()->attach($pedidoId, [
                    'observacion_pedido' => $observacion,
                    'fecha_registro' => now(),
                ]);
            }
        }

        return redirect()->route('novedades.index')->with('success', 'Novedad creada correctamente.');
    }

    public function edit(Novedad $novedad)
    {
        $pedidos = Pedido::orderBy('id_pedido')->get();
        return view('novedades.form', compact('novedad', 'pedidos'));
    }

    public function update(Request $request, Novedad $novedad)
    {
        $validated = $request->validate([
            'descripcion_novedad' => 'required|string|max:255',
            'fecha_novedad' => 'required|date_format:Y-m-d H:i:s',
            'estado_novedad' => 'required|in:PENDIENTE,RESUELTA,CANCELADA',
            'pedidos' => 'nullable|array',
            'pedidos.*' => 'exists:pedidos,id_pedido',
        ]);


        $novedad->update([
            'descripcion_novedad' => $validated['descripcion_novedad'],
            'fecha_novedad' => $validated['fecha_novedad'],
            'estado_novedad' => $validated['estado_novedad'],
        ]);
        if (isset($validated['pedidos'])) {
            $novedad->pedidos()->sync([]);
            foreach ($validated['pedidos'] as $pedidoId) {
                $observacion = $request->input("observacion_pedido.{$pedidoId}", null);
                $novedad->pedidos()->attach($pedidoId, [
                    'observacion_pedido' => $observacion,
                    'fecha_registro' => now(),
                ]);
            }
        } else {
            $novedad->pedidos()->detach();
        }

        return redirect()->route('novedades.index')->with('success', 'Novedad actualizada correctamente.');
    }
}
