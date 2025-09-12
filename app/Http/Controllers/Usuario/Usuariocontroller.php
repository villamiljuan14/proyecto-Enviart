<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use App\Http\Requests\StoreUsuarioRequest;
use Illuminate\Http\Request;

class Usuariocontroller extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('rol') 
                        ->orderBy('id_usuario')
                        ->get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $roles = Rol::orderBy('nombre_rol')->get(['id_rol', 'nombre_rol']);

        return view('usuarios.create', [
            'roles' => $roles,
        ]);
    }

    public function store(StoreUsuarioRequest $request)
    {
        Usuario::create($request->validated());

        return redirect()->route('usuarios.index')->with('ok', 'Usuario creado');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario)
    {
        $roles = Rol::orderBy('tipo_rol')->get(['id_rol', 'tipo_rol']);
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(StoreUsuarioRequest $request, Usuario $usuario)
    {
        $usuario->update($request->validated());

        return redirect()->route('usuarios.index')->with('ok', 'Usuario actualizado');
    }

    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return back()->with('ok', 'Usuario eliminado');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}
