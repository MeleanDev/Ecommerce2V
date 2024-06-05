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
        Schema::create('inicios', function (Blueprint $table) {
            $table->id();
            $table->string('informacion');
            $table->string('producto1')->nullable();
            $table->string('producto2')->nullable();
            $table->string('producto3')->nullable();
            $table->string('producto4')->nullable();
            $table->string('producto5')->nullable();
            $table->string('producto6')->nullable();
            $table->string('producto7')->nullable();
            $table->string('producto8')->nullable();
            $table->string('producto9')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inicios');
    }
};
