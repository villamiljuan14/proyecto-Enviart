<?php

namespace App\Http\Controllers\Direcciones;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use App\Http\Requests\StoreDireccionRequest;  
use App\Http\Requests\UpdateDireccionRequest; 

class DireccionController extends Controller
{
    public function index()
    {
        $direcciones = Direccion::where('usuarios_id_usuario', auth()->id())
            ->orderBy('id_direccion', 'desc')
            ->get();
        return view('direcciones.index', compact('direcciones'));
    }

    public function create()
    {
        return view('direcciones.create');
    }

    public function store(StoreDireccionRequest $request) // ← Usa StoreDireccionRequest
    {
        Direccion::create(array_merge($request->validated(), [
            'usuarios_id_usuario' => auth()->id()
        ]));

        return redirect()->route('direcciones.index')->with('ok', 'Dirección creada correctamente.');
    }

    public function edit(Direccion $direccion)
    {
        if ($direccion->usuarios_id_usuario !== auth()->id()) {
            abort(403);
        }
        return view('direcciones.edit', compact('direccion'));
    }

    public function update(UpdateDireccionRequest $request, Direccion $direccion) // ← Usa UpdateDireccionRequest
    {
        if ($direccion->usuarios_id_usuario !== auth()->id()) {
            abort(403);
        }

        $direccion->update($request->validated());

        return redirect()->route('direcciones.index')->with('ok', 'Dirección actualizada correctamente.');
    }

    public function destroy(Direccion $direccion)
    {
        if ($direccion->usuarios_id_usuario !== auth()->id()) {
            abort(403);
        }

        try {
            $direccion->delete();
            return back()->with('ok', 'Dirección eliminada correctamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: la dirección está relacionada con pedidos.');
        }
    }
}