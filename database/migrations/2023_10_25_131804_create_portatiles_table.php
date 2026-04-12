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
        Schema::create('portatiles', function (Blueprint $table) {
            $table->id('idPortatil');
            $table->string('marcaPortatil');
            $table->string('númeroSeriePortatil');
            $table->string('especificacionesPortatil');
            $table->string('colorPortatil');
            $table->unsignedBigInteger('usuario');
            $table->timestamps();

            $table->foreign('usuario')->references('idUsuario')->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portatils');
    }
};
