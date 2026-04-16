<?php

namespace App\Http\Controllers;

use App\Models\Nutriologo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NutriologoController extends Controller
{
    // Listar Nutriólogos (Consultar)
    public function index() {
        $nutriologos = Nutriologo::with('user')->get();
        return view('nutriologos.index', compact('nutriologos'));
    }

    // Formulario de creación
    public function create() {
        return view('nutriologos.create');
    }

    // Guardar (Añadir)
    public function store(Request $request) {
        // 1. Crear el Usuario primero
        $user = User::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->password),
            'rol' => 'Nutriologo',
        ]);

        // 2. Crear el perfil de Nutriólogo
        Nutriologo::create([
            'usuario_id' => $user->id,
            'cedulaProfesional' => $request->cedula,
            'especialidad' => $request->especialidad,
            'foto_url' => $request->foto_url,
        ]);

        return redirect()->route('nutriologos.index');
    }

    // Editar - Prepara los datos para la vista
    public function edit($id) {
        $nutriologo = Nutriologo::with('user')->findOrFail($id);
        return view('nutriologos.edit', compact('nutriologo'));
    }

    public function perfil() {
    // Buscamos el nutriólogo que está logueado actualmente
    $nutriologo = Nutriologo::with('user')->where('usuario_id', auth()->id())->first();

    if (!$nutriologo) {
        return redirect('/')->with('error', 'No se encontró el perfil del nutriólogo.');
    }

    return view('nutriologos.perfil', compact('nutriologo'));
    }

    // Actualizar (Modificar) - Guarda los cambios en la BD
    public function update(Request $request, $id)
    {
        // 1. Buscamos al nutriólogo y su usuario relacionado
        $nutriologo = Nutriologo::findOrFail($id);
        
        // 2. Actualizamos los datos del Usuario vinculado (Nombre)
        $nutriologo->user->update([
            'nombre' => $request->nombre,
        ]);

        // 3. Actualizamos los datos específicos del Nutriólogo
        $nutriologo->update([
            'cedulaProfesional' => $request->cedula,
            'especialidad' => $request->especialidad,
            'foto_url' => $request->foto_url,
        ]);

        return redirect()->route('nutriologos.index')->with('success', 'Nutriólogo actualizado con éxito');
    }

    // Eliminar
    public function destroy($id) {
        // Al borrar el user, se borra el nutriólogo automáticamente por el 'cascade' de la migración
        User::destroy($id); 
        return redirect()->route('nutriologos.index');
    }
}