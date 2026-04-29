<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    protected $table = 'dietas';
    protected $primaryKey = 'idDieta';

    protected $fillable = [
        'nutriologo_id',
        'paciente_id',
        'fechaInicio',
        'fechaFin',
        'descripcion',
    ];

    public function nutriologo() {
        return $this->belongsTo(Nutriologo::class, 'nutriologo_id', 'usuario_id');
    }

    public function menus() {
        return $this->hasMany(Menu::class, 'dieta_id', 'idDieta');
    }

    public function pacientes() {
        return $this->belongsToMany(Paciente::class, 'paciente_dieta', 'dieta_id', 'paciente_id');
    }
}
