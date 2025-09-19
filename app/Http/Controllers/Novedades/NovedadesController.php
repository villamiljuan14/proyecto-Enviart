<?php

namespace App\Http\Controllers\Novedades;

use App\Http\Controllers\Controller;
use App\Models\Novedad;
use Illuminate\Http\Request;

class NovedadesController extends Controller
{
    public function index()
    {
        $novedades = Novedad::all();
        return view('Novedades.index', compact('novedades'));
    }

    public function create()
    {
        $novedades = Novedad::all();
        return view('Novedades.index', compact('novedades'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Novedad $novedad)
    {
        //
    }

    public function edit(Novedad $novedad)
    {
        //
    }

    public function update(Request $request, Novedad $novedad)
    {
        //
    }

    public function destroy(Novedad $novedad)
    {
        //
    }
}
