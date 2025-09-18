<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Cargar mantenimiento si aplica...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Registrar autoload de Composer...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel y manejar la request...
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
