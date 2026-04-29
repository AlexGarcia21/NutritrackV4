<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimento extends Model
{
    use HasFactory;

    // Indicamos los campos que se pueden llenar
    protected $fillable = [
        'nombre',
        'grupo',
        'unidad_medida',
        'cantidad_equivalente',
        'calorias',
        'proteinas',
        'carbohidratos',
        'grasas'
    ];
} 
