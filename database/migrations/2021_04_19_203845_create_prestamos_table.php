<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipo_id')->index();
            $table->integer('persona_id')->index();
            $table->integer('proyecto_id')->index();
            $table->integer('supervisor_id')->index();
            $table->integer('almacenista_recibe')->index();
            $table->integer('almacenista_entrega')->index();
            $table->string('lugar_trabajo');
            $table->string('sistema')->nullable();
            $table->integer('bloque');
            $table->string('observacion')->nullable();
            $table->Date('fecha_prestamo');
            $table->Date('fecha_devolucion_prevista')->nullable();
            $table->date('fecha_devolucion')->nullable();
            $table->string('estado')->default('PRESTADO');
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
        Schema::dropIfExists('prestamos');
    }
}
