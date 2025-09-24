<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario\UsuarioController;
use App\Http\Controllers\Formulario\FormularioController;
use App\Http\Controllers\Pedido\PedidoController;
use App\Http\Controllers\Ruta\RutaController;
use App\Http\Controllers\Novedades\NovedadesController;

use App\Http\Controllers\Vehiculos\VehiculoController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->resource('usuarios', UsuarioController::class)
    ->names('usuarios');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->resource('pedidos', PedidoController::class)
    ->names('pedidos');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->resource('vehiculos', VehiculoController::class)
    ->names('vehiculos');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
