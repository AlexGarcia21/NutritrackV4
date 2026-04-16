<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Llamamos a los seeders manuales en orden lógico
        $this->call([
            UsuarioSeeder::class,  // Crea a Pedro (Nutriólogo) y Vanessa
            PacienteSeeder::class, // Vincula a los pacientes con el nutriólogo
            DietaSeeder::class,    // Crea las dietas para los nutriólogos
        ]);

        // 2. Creamos 5 Administradores aleatorios con Factory
        User::factory(5)->create([
            'rol' => 'Administrador',
        ]);

        // 3. Creamos 50 Pacientes aleatorios con Factory
        User::factory(50)->create([
            'rol' => 'Paciente',
        ]);
    }
}