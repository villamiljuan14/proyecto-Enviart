<?php

namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Usuario;
use App\Models\Novedad;
use App\Models\Pago;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with(['usuario', 'novedades', 'pagos'])
                         ->orderBy('id_pedido', 'desc')
                         ->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $usuarios = Usuario::orderBy('primer_nombre')->get(['id_usuario', 'primer_nombre', 'primer_apellido']);
        $novedades = Novedad::orderBy('descripcion_novedad')->get(['id_novedad', 'descripcion_novedad']);
        $pagos = Pago::orderBy('id_pago')->get(['id_pago', 'metodo_de_pago']);

        return view('pedidos.create', compact('usuarios', 'novedades', 'pagos'));
    }

    public function store(StorePedidoRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function() use ($data, &$pedido) {
            $pedido = Pedido::create([
                'estado_pedido' => $data['estado_pedido'],
                'fecha_pedido' => now(),
                'usuario_id_usuario' => auth()->id(),
                'peso_pedido' => $data['peso_pedido'] ?? 0,
                'largo_pedido' => $data['largo_pedido'] ?? 0,
                'alto_pedido' => $data['alto_pedido'] ?? 0,
                'fragil' => $data['fragil'] ?? false,
            ]);

            if (!empty($data['novedad'])) {
                $novedad = Novedad::firstOrCreate([
                    'descripcion_novedad' => $data['novedad']
                ]);

                $pedido->novedades()->attach($novedad->id_novedad, [
                    'observacion_pedido' => $data['novedad'],
                    'fecha_registro' => now(),
                ]);
            }

            if (!empty($data['pagos'])) {
                $pedido->pagos()->sync($data['pagos']);
            }
        });

        return redirect()->route('pedidos.index')
                         ->with('ok', 'Pedido creado correctamente.');
    }

    public function show(Pedido $pedido)
    {
        $pedido->load(['usuario', 'novedades', 'pagos']);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        $usuarios = Usuario::orderBy('primer_nombre')->get(['id_usuario', 'primer_nombre', 'primer_apellido']);
        $novedades = Novedad::orderBy('descripcion_novedad')->get(['id_novedad', 'descripcion_novedad']);
        $pagos = Pago::orderBy('id_pago')->get(['id_pago', 'metodo_de_pago']);

        return view('pedidos.edit', compact('pedido', 'usuarios', 'novedades', 'pagos'));
    }

    public function update(UpdatePedidoRequest $request, Pedido $pedido)
    {
        $data = $request->validated();

        DB::transaction(function() use ($data, $pedido) {
            $pedido->update([
                'estado_pedido' => $data['estado_pedido'],
                'peso_pedido' => $data['peso_pedido'] ?? $pedido->peso_pedido,
                'largo_pedido' => $data['largo_pedido'] ?? $pedido->largo_pedido,
                'alto_pedido' => $data['alto_pedido'] ?? $pedido->alto_pedido,
                'fragil' => $data['fragil'] ?? $pedido->fragil,
            ]);

            if (!empty($data['novedad'])) {
                $novedad = Novedad::firstOrCreate([
                    'descripcion_novedad' => $data['novedad']
                ]);

                $pedido->novedades()->sync([
                    $novedad->id_novedad => [
                        'observacion_pedido' => $data['novedad'],
                        'fecha_registro' => now()
                    ]
                ]);
            }

            if (!empty($data['pagos'])) {
                $pedido->pagos()->sync($data['pagos']);
            }
        });

        return redirect()->route('pedidos.index')
                         ->with('ok', 'Pedido actualizado correctamente.');
    }

    public function destroy(Pedido $pedido)
    {
        try {
            $pedido->delete();
            return back()->with('ok', 'Pedido eliminado correctamente.');
        } catch (\Throwable $e) {
            return back()->withErrors('No se puede eliminar: el pedido tiene registros relacionados.');
        }
    }
}
