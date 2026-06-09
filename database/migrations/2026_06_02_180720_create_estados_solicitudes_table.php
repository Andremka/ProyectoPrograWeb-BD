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
            $table->unsignedBigInteger('id_solicitud');
            $table->string('estado', 20)->default('pendiente');
            $table->timestamp('fecha_cambio')->useCurrent();
            $table->text('observacion')->nullable();

            $table->foreign('id_solicitud')
                  ->references('id_solicitud')
                  ->on('solicitudes')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados_solicitudes');
    }
};
