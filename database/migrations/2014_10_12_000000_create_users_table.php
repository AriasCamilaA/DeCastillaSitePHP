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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('noDocumento_Usuario');
            $table->string('correo_Usuario', 45);
            $table->string('pasword_Usuario', 100);
            $table->bigInteger('celular_Usuario');
            $table->string('nombre_Usuario', 24);
            $table->string('apellido_Usuario', 35);
            $table->unsignedBigInteger('id_Rol_FK');
            // $table->foreign('id_Rol_FK')->references('id_Rol')->on('Rol')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
