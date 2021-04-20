<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicituds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo_id')->index();
            $table->integer('persona_id')->index();
            $table->integer('proyecto_id')->index();
            $table->string('nombre_equipo');
            $table->integer('supervisor_id')->index();
            $table->string('lugar_trabajo');
            $table->integer('bloque');
            $table->dateTime('fecha_realizacion');
            $table->dateTime('fecha_respuesta')->nullable();
            $table->string('estado')->default('SOLICITADO');
            $table->string('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
}
