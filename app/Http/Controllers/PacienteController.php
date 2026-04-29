<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use App\Models\Cita;
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

    public function show($id) {
        // Traemos al paciente y TODAS sus métricas ordenadas por fecha
        $paciente = Paciente::with(['user', 'metricas'])
        ->where('usuario_id', $id)
        ->where('nutriologo_id', Auth::id()) 
        ->firstOrFail();

        // Esto te servirá para la gráfica de progreso que mencionamos en el MVP
        $historicoPeso = $paciente->metricas->pluck('peso');
        $fechas = $paciente->metricas->pluck('fecha');

        return view('pacientes.show', compact('paciente', 'historicoPeso', 'fechas'));
    }

    public function edit($id) {
        // Añadimos la validación de nutriologo_id para que un nutriólogo no pueda editar pacientes de otro
        $paciente = Paciente::with('user')
            ->where('usuario_id', $id)
            ->where('nutriologo_id', Auth::id())
            ->firstOrFail();

        return view('pacientes.edit', compact('paciente'));
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado');
    }

    //función para la agenda del nutriologo y crear una nueva cita
    public function agenda() {
        $nutriologo = Auth::user()->nutriologo;
        // Traemos las citas del nutriólogo con el nombre del paciente
        $citas = \App\Models\Cita::where('nutriologo_id', Auth::id())
                    ->with('paciente.user')
                    ->orderBy('fecha_hora', 'asc')
                    ->get();

        return view('agenda.index', compact('nutriologo', 'citas'));
    }

    //funcion para guardar citas
    public function guardarCita(Request $request) {
        // Unimos fecha y hora en un solo campo para la DB
        $fecha_hora = $request->fecha . ' ' . $request->hora;

        \App\Models\Cita::create([
            'nutriologo_id' => Auth::id(),
            'paciente_id' => $request->paciente_id,
            'fecha_hora' => $fecha_hora,
            'motivo' => $request->motivo,
            'estado' => $request->estado,
        ]);

        return redirect()->route('agenda')->with('success', 'Cita agendada correctamente');
    }

    public function planificador() 
    {
        // Por ahora, solo cargamos la vista. 
        // En una fase más avanzada, aquí buscaríamos los alimentos de la base de datos.
        return view('dietas'); 
    }
}