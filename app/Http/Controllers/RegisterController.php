<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nutriologo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Muestra la vista con Tailwind
    public function showRegister()
    {
        return view('auth.register');
    }

    // Procesa el registro
    public function store(Request $request)
    {
        // 1. Crear el registro en la tabla 'users'
        $user = User::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->password),
            'rol' => 'Nutriologo',
        ]);

        // 2. Crear el perfil en la tabla 'nutriologos'
        Nutriologo::create([
            'usuario_id' => $user->id,
            'cedulaProfesional' => $request->cedula,
            'especialidad' => $request->especialidad,
            'foto_url' => $request->foto_url,
        ]);

        // 3. Iniciar sesión y mandar al perfil
        Auth::login($user);
        return redirect()->route('perfil');
    }
}