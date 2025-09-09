<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario\Usuariocontroller;
use App\Http\Controllers\Formulario\FormularioController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
->resource('Usuarios',UsuarioController::class)
->names('Usuarios');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
