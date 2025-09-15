<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Rol;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;

class UsuarioController extends Controller
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
        $roles = Rol::orderBy('tipo_rol')->get(['id_rol', 'tipo_rol']);

        return view('usuarios.create', [
            'roles' => $roles,
        ]);
    }
    public function store(StoreUsuarioRequest $request)
    {
        $data = $request->validated();
        $data['contrasena_usuario'] = bcrypt($data['contrasena_usuario']);

        Usuario::create($data);

        return redirect()->route('usuarios.index')
            ->with('ok', 'Usuario creado correctamente.');
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
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
    {
        $data = $request->validated();

        if (!empty($data['contrasena_usuario'])) {
            $data['contrasena_usuario'] = bcrypt($data['contrasena_usuario']);
        } else {
            unset($data['contrasena_usuario']); 
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')
            ->with('ok', 'Usuario actualizado correctamente.');
    }

    public function destroy(Usuario $usuario)
    {
        try {
            $usuario->delete();
            return back()->with('ok', 'Usuario eliminado correctamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: tiene registros relacionados.');
        }
    }
}

