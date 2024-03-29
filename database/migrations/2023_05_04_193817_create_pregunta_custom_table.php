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
        Schema::create('pregunta_custom', function (Blueprint $table) {
            $table->id();
            $table->integer('paquete_pregunta');
            $table->string('pregunta');
            $table->integer('dificultad');
            $table->string('respuestas_incorrectas');
            $table->string('respuesta_correcta');
            $table->string('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregunta_custom');
    }
};
