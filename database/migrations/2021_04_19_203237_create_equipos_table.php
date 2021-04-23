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
            $table->string('imagen')->nullable();
            $table->string('serial')->unique();
            $table->string('codigo_SAP')->unique()->nullable();
            $table->string('valor_compra')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('marca')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->double('valor_dia')->nullable();
            $table->integer('responsable')->index();
            $table->string('observaciones')->nullable();
            $table->string('estado')->default('DISPONIBLE');
            $table->string('tipo')->nullable();
            
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
