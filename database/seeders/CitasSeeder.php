<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cita::insert([
            [
                'nutriologo_id' => 59, 
                'paciente_id' => 61, 
                'fecha_hora' => '2026-05-04 10:00:00', 
                'motivo' => 'Consulta de seguimiento',
                'estado' => 'Pendiente'
            ],
            [
                'nutriologo_id' => 59, 
                'paciente_id' => 61, 
                'fecha_hora' => '2026-05-06 16:00:00', 
                'motivo' => 'Revisión de dieta Keto',
                'estado' => 'Pendiente'
            ],
        ]);
    }
}
