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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nombreEmpresa');
            $table->string('razonSocial')->nullable();
            $table->string('rif');
            $table->string('correo');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('estado');
            $table->string('codigoPostal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
