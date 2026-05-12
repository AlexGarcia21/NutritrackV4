<?php
// Esto le indica al navegador que debe renderizar HTML y no descargar el archivo
header('Content-Type: text/html; charset=utf-8');

// Cargamos el autoloader de Composer
require __DIR__ . '/../../vendor/autoload.php';

// Iniciamos la aplicación Laravel
$app = require __DIR__ . '/../../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Capturamos la petición y generamos la respuesta
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);