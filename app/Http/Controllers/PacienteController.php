<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    public function index() {
        // Traemos el paciente con su usuario cargado para que $p->user->nombre funcione
        $pacientes = Paciente::with('user')->where('nutriologo_id', Auth::id())->get();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create() {
        return view('pacientes.create');
    }

    public function store(Request $request) {
        $user = User::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->password),
            'rol' => 'Paciente',
        ]);

        Paciente::create([
            'usuario_id' => $user->id,
            'nutriologo_id' => Auth::id(), 
            'edad' => $request->edad,
            'pesoActual' => $request->peso,
            'altura' => $request->altura,
            'imc' => round($request->peso / ($request->altura * $request->altura), 2)
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente creado');
    }

    // AÑADE ESTO: Para que el botón editar funcione
    public function edit($id) {
        $paciente = Paciente::with('user')->where('usuario_id', $id)->firstOrFail();
        return view('pacientes.edit', compact('paciente'));
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado');
    }
}