<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $primaryKey = 'usuario_id';
    public $incrementing = false;

    protected $fillable = [
        'usuario_id', 
        'nutriologo_id', 
        'edad',
        'pesoActual',
        'altura',
        'imc',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function nutriologo() {
        return $this->belongsTo(Nutriologo::class, 'nutriologo_id', 'usuario_id');
    }

    public function metricas() { 
        return $this->hasMany(Metrica::class, 'paciente_id', 'usuario_id'); 
    }

    public function dietas() {
        return $this->belongsToMany(Dieta::class, 'paciente_dieta', 'paciente_id', 'dieta_id');
    }
}
