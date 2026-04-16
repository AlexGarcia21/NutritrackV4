<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $nutriologo = \App\Models\User::where('rol', 'Nutriologo')->first();
        $pacientesSinDatos = \App\Models\User::where('rol', 'Paciente')->get();

        foreach ($pacientesSinDatos as $u) {
            \App\Models\Paciente::firstOrCreate(
                ['usuario_id' => $u->id],
                [
                    'nutriologo_id' => $nutriologo->id,
                    'edad' => 25,
                    'pesoActual' => 70.0,
                    'altura' => 1.70,
                    'imc' => 24.22
                ]
            );
        }
    }
}
