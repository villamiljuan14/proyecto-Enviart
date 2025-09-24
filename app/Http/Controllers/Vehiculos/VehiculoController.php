<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehiculoRequest;
use App\Http\Requests\UpdateVehiculoRequest;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::with('usuario')->orderBy('id_vehiculo', 'desc')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create()
    {
        $usuarios = Usuario::orderBy('primer_nombre')->get(['id_usuario', 'primer_nombre', 'primer_apellido']);
        return view('vehiculos.create', compact('usuarios'));
    }

    public function store(StoreVehiculoRequest $request)
    {
        $data = $request->validated();
        Vehiculo::create($data);
        return redirect()->route('vehiculos.index')->with('ok', 'Vehículo creado correctamente.');
    }

    public function show(Vehiculo $vehiculo)
    {
        $vehiculo->load('usuario');
        return view('vehiculos.show', compact('vehiculo'));
    }

    public function edit(Vehiculo $vehiculo)
    {
        $usuarios = Usuario::orderBy('primer_nombre')->get(['id_usuario', 'primer_nombre', 'primer_apellido']);
        return view('vehiculos.edit', compact('vehiculo', 'usuarios'));
    }

    public function update(UpdateVehiculoRequest $request, Vehiculo $vehiculo)
    {
        $data = $request->validated();
        $vehiculo->update($data);
        return redirect()->route('vehiculos.index')->with('ok', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        try {
            $vehiculo->delete();
            return back()->with('ok', 'Vehículo eliminado correctamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: el vehículo tiene registros relacionados.');
        }
    }
}
