<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dieta;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class DietaController extends Controller
{
    public function store(Request $request)
    {
        // 1. Guardamos el encabezado de la dieta
        $dieta = Dieta::create([
            'nutriologo_id' => Auth::id(),
            'paciente_id' => $request->paciente_id, // El ID 61 que mandamos
            'fechaInicio' => now(),
            'fechaFin' => now()->addMonths(1), // Por defecto un mes
            'descripcion' => 'Plan alimenticio generado por NutriTrack AI'
        ]);

        // 2. Guardamos el detalle en la tabla menus
        // Aquí puedes recibir el texto de los textareas o el JSON de tu JS
        Menu::create([
            'dieta_id' => $dieta->idDieta,
            'desayuno' => $request->desayuno ?? 'Huevo con espinacas y avena',
            'comida' => $request->comida ?? 'Pechuga de pollo con arroz',
            'cena' => $request->cena ?? 'Yogurt con almendras',
            'snacks' => $request->snacks ?? 'Fruta de temporada'
        ]);

        return redirect()->route('pacientes.show', $request->paciente_id)
            ->with('success', '¡Plan Alimenticio guardado y asignado al expediente!');
    }
}

