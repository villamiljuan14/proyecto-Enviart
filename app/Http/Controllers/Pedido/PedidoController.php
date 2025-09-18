<?php
namespace App\Http\Controllers\Pedido;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Usuario;
use App\Models\Novedad;
use App\Models\Pago;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with(['usuario', 'novedad', 'pago'])
                        ->orderBy('id_pedido', 'desc')
                        ->get();

        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $usuarios = Usuario::orderBy('primer_nombre')->get(['id_usuario', 'primer_nombre', 'primer_apellido']);
        $novedades = Novedad::orderBy('descripcion_novedad')->get(['id_novedad', 'descripcion_novedad']);
        $pagos = Pago::orderBy('id_pago')->get(['id_pago', 'metodo_de_pago']); 

        return view('pedidos.create', [
            'usuarios' => $usuarios,
            'novedades' => $novedades,
            'pagos' => $pagos,
        ]);
    }

    public function store(StorePedidoRequest $request)
    {
        $data = $request->validated();
        Pedido::create($data);

        return redirect()->route('pedidos.index')
            ->with('ok', 'Pedido creado correctamente.');
    }

    public function show(Pedido $pedido)
    {
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
        $pedido->update($data);

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

