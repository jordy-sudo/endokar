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
        Schema::create('provider_laboral_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id')->constrained()->onDelete('cascade');
            $table->string('vendedor')->nullable();
            $table->string('vendedor_reemplazo')->nullable();
            $table->string('email_ventas')->nullable();
            $table->string('horario_atencion')->nullable();
            $table->string('telefono_vendedor')->nullable();
            $table->string('extension')->nullable();
            $table->string('celular')->nullable();
            $table->string('servicio_entrega')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers_laboral_data');
    }
};
