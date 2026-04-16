<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        // Validamos que lleguen los datos
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required',
        ]);

        // IMPORTANTE: Laravel Auth usa 'password' internamente para validar el Hash.
        // Aunque tu columna se llame 'contrasena', en el attempt debemos pasarle la clave 'password'.
        $credenciales = [
            'correo' => $request->correo,
            'password' => $request->contrasena, // Laravel mapeará esto a tu columna contrasena
        ];

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect()->intended('/perfil');
        }

        return back()->withErrors([
            'correo' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}