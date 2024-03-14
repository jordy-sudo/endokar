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
        Schema::create('subcategoria_industrials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('categoria_industrials')->onDelete('cascade'); // Agrega la relación con la tabla de categorías
            $table->string('nombre'); // Agrega la columna 'nombre' para el nombre de la subcategoría
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategoria_industrials');
    }
};
