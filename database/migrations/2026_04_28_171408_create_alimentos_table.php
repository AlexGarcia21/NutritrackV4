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
        Schema::create('alimentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); 
            $table->string('grupo'); // Ej: Cereales, Leguminosas, Frutas
            $table->string('unidad_medida'); // Ej: Taza, Pieza, Gramos
            $table->decimal('cantidad_equivalente', 8, 2); // Ej: 0.5 (media taza)
            $table->integer('calorias');
            $table->decimal('proteinas', 5, 2);
            $table->decimal('carbohidratos', 5, 2);
            $table->decimal('grasas', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alimentos');
    }
};
