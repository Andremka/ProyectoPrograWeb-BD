<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('objetivos', function (Blueprint $table) {
            $table->id('id_objetivo');
            $table->string('descripcion', 255);
            $table->string('categoria', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('objetivos');
    }
};
