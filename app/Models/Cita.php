<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas'; // Por si acaso tu tabla se llama citas

    protected $fillable = [
        'nutriologo_id',
        'paciente_id',
        'fecha_hora',
        'motivo',
        'estado'
    ];

    // Relación: Una cita pertenece a un paciente
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id', 'usuario_id');
    }

    // Relación: Una cita pertenece a un nutriólogo
    public function nutriologo()
    {
        return $this->belongsTo(Nutriologo::class, 'nutriologo_id', 'usuario_id');
    }
}
