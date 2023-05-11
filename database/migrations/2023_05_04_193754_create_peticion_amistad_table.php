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
        Schema::create('peticion_amistad', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id_1');
            $table->integer('user_id_2');
            $table->boolean('user_1_acepta');
            $table->boolean('user_2_acepta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peticion_amistad');
    }
};
