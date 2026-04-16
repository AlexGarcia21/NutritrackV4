<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; 
use App\Http\Controllers\NutriologoController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\PacienteController;

// Ruta de inicio (puedes dejar la que ya tenías)
Route::get('/', function () {
    return view('welcome');
});

// Rutas de Autenticación (Login y Registro)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas Protegidas (Solo para usuarios logueados)
Route::middleware(['auth'])->group(function () {
    
    // Vista del Perfil del Nutriólogo logueado
    Route::get('/perfil', [NutriologoController::class, 'perfil'])->name('perfil');
    
    // Tu CRUD de nutriólogos que ya tenías
    Route::resource('nutriologos', NutriologoController::class);
    Route::resource('pacientes', PacienteController::class);
});

