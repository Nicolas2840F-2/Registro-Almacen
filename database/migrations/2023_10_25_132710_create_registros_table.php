<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id('idRegistro');
            $table->unsignedBigInteger('portatil');
            $table->unsignedBigInteger('usuario');
            $table->timestamp('fechaIngresoRegistro')->useCurrent();
            $table->datetime('fechaSalidaRegistro')->nullable();
            $table->timestamps();

            $table->foreign('portatil')->references('idPortatil')->on('portatiles');
            $table->foreign('usuario')->references('idUsuario')->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
