<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estados_solicitudes', function (Blueprint $table) {
            $table->id('id_estado');
            $table->foreignId('id_solicitud')->constrained('solicitudes', 'id_solicitud')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('estado', ['pendiente', 'activa', 'cerrada'])->default('pendiente');
            $table->timestamp('fecha_cambio')->useCurrent();
            $table->text('observacion')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados_solicitudes');
    }
};
