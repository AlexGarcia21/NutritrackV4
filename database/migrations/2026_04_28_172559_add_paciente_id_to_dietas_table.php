<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dietas', function (Blueprint $table) {
            // La hacemos nullable() para que no explote con los registros viejos
            $table->foreignId('paciente_id')
                ->after('nutriologo_id')
                ->nullable() 
                ->constrained('pacientes', 'usuario_id')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('dietas', function (Blueprint $table) {
            // Por si queremos deshacer el cambio
            $table->dropForeign(['paciente_id']);
            $table->dropColumn('paciente_id');
        });
    }
};
