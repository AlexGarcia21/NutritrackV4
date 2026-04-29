<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nutriologo_id')->constrained('nutriologos', 'usuario_id')->onDelete('cascade');
            $table->foreignId('paciente_id')->constrained('pacientes', 'usuario_id')->onDelete('cascade');
            $table->dateTime('fecha_hora');
            $table->string('motivo')->nullable(); // Ej: Seguimiento, Primera vez
            $table->enum('estado', ['Pendiente', 'Completada', 'Cancelada'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
