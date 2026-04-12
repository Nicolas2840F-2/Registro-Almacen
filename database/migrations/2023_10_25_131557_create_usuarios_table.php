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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->unsignedBigInteger('tipoDocumentoUsuario');
            $table->string('documentoUsuario');
            $table->string('nombreUsuario');
            $table->unsignedBigInteger('rolUsuario')->default(1);
            $table->string('telefonoUsuario');
            $table->string('email');
            $table->string('password');
            $table->string('reset_code')->nullable();
            $table->timestamps();


            $table->foreign('tipoDocumentoUsuario')->references('idTipoDocumento')->on('tipoDocumentos');
            $table->foreign('rolUsuario')->references('idRol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
