<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categoria_id')->index();
            $table->string('codigo_interno')->unique();
            $table->string('serial');
            $table->string('codigo_SAP');
            $table->string('valor_compra');
            $table->string('ubicacion');
            $table->string('marca')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('fecha_ingreso');
            $table->double('valor_dia')->nullable();
            $table->string('responsable');
            $table->string('observaciones')->nullable();
            $table->string('estado')->default('DISPONIBLE');
            $table->string('tipo');
            $table->string('imagen')->nullable();
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
        Schema::dropIfExists('equipos');
    }
}
