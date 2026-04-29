<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\NutriologoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MetricaController;
use App\Http\Controllers\DietaController;

// --- RUTAS PÚBLICAS ---
Route::get('/', function () { return view('welcome'); });

// Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- RUTAS PROTEGIDAS (Solo Nutriólogos Logueados) ---
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Principal
    Route::get('/dashboard', function () {
        $nutriologo = Auth::user()->nutriologo; 
        return view('dashboard', compact('nutriologo'));
    })->name('dashboard');

    // Perfil y Configuración
    Route::get('/perfil', [NutriologoController::class, 'perfil'])->name('perfil');
    Route::get('/gestion-pagos', [NutriologoController::class, 'gestionarPagos'])->name('pagos');

    // Gestión de Nutriólogos (Asegúrate de que esta línea esté aquí)
    Route::resource('nutriologos', NutriologoController::class);

    // Gestión de Pacientes (CRUD)
    Route::resource('pacientes', PacienteController::class);
    // Sobreescribimos la ruta show para asegurar el ID
    Route::get('/pacientes/{id}', [PacienteController::class, 'show'])->name('pacientes.show');

    // Herramientas del Nutriólogo
    Route::get('/agenda', [PacienteController::class, 'agenda'])->name('agenda');
    Route::get('/planificador', [PacienteController::class, 'planificador'])->name('planificador');

    // --- ACCIONES DE GUARDADO (POST) ---
    
    // Guardar Citas (¡Esta es la que faltaba!)
    Route::post('/agenda/cita', [PacienteController::class, 'guardarCita'])->name('citas.store');
    
    // Guardar Métricas de Progreso
    Route::post('/metricas', [MetricaController::class, 'store'])->name('metricas.store');
    
    // Guardar Planes de Dieta
    Route::post('/dietas/guardar', [DietaController::class, 'store'])->name('dietas.store');

    Route::patch('/agenda/cita/{id}/estado', function ($id) {
        $cita = \App\Models\Cita::findOrFail($id);
        $cita->update(['estado' => 'Completada']);
        return back()->with('success', '¡Cita marcada como completada!');
    })->name('citas.update');

});