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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 13)->nullable(false);
            $table->string('certificado_ruc', 150)->nullable(false);
            $table->string('telefono', 10)->nullable(false);
            $table->unsignedBigInteger('provincia')->nullable(false);
            $table->string('direccion', 60)->nullable(false);
            $table->string('sitio_web', 100)->nullable(true);
            $table->string('industria')->nullable(true);
            $table->string('observaciones', 100)->nullable(true);
            $table->string('razon_social', 38)->nullable(false);
            $table->string('celular', 10)->nullable(false);
            $table->unsignedBigInteger('ciudad')->nullable(false);
            $table->string('geolocalizacion', 60)->nullable(false);
            $table->string('email_retenciones', 241)->nullable(false);
            $table->string('nombre_comercial', 60)->nullable(false);
            $table->boolean('check_politica_tratamiento_datos')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
