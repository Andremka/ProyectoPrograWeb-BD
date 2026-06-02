<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->foreignId('id_usuario')->constrained('usuarios', 'id_usuario')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_objetivo')->constrained('objetivos', 'id_objetivo')->onDelete('restrict')->onUpdate('cascade');
            $table->string('session_id', 255)->nullable();
            $table->text('mensaje')->nullable();
            $table->timestamp('fecha_solicitud')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
};
