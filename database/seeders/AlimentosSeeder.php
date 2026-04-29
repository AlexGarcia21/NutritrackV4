<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlimentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('alimentos')->insert([
            ['nombre' => 'Avena cocida', 'grupo' => 'Cereales', 'unidad_medida' => 'taza', 'cantidad_equivalente' => 0.5, 'calorias' => 70, 'proteinas' => 2.5, 'carbohidratos' => 13, 'grasas' => 1.2],
            ['nombre' => 'Huevo blanco', 'grupo' => 'Origen Animal', 'unidad_medida' => 'pieza', 'cantidad_equivalente' => 1, 'calorias' => 75, 'proteinas' => 7, 'carbohidratos' => 0.5, 'grasas' => 5],
            ['nombre' => 'Pechuga de Pollo', 'grupo' => 'Origen Animal', 'unidad_medida' => 'gramos', 'cantidad_equivalente' => 30, 'calorias' => 45, 'proteinas' => 7, 'carbohidratos' => 0, 'grasas' => 1],
        ]);
    }
}
