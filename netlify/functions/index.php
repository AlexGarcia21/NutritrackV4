<?php
// Evita que el navegador descargue el archivo
header('Content-Type: text/html; charset=utf-8');

// Carga el motor de Laravel
require __DIR__ . '/../../vendor/autoload.php';
$app = require __DIR__ . '/../../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// Procesa la petición
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();
$kernel->terminate($request, $response);