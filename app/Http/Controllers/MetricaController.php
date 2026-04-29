<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metrica;
use App\Models\Paciente;

class MetricaController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validar (opcional pero recomendado)
        $request->validate([
            'peso' => 'required|numeric',
            'grasa' => 'required|numeric',
            'paciente_id' => 'required'
        ]);

        // 2. Obtener altura del paciente para calcular IMC
        $paciente = Paciente::where('usuario_id', $request->paciente_id)->first();
        $altura = $paciente->altura;
        $imc = $request->peso / ($altura * $altura);

        // 3. Crear el registro
        Metrica::create([
            'paciente_id' => $request->paciente_id,
            'fecha' => $request->fecha,
            'peso' => $request->peso,
            'grasaCorporal' => $request->grasa,
            'imc' => round($imc, 2)
        ]);

        return back()->with('success', '¡Avance registrado exitosamente!');
    }
}