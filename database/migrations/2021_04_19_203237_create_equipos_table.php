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
            $table->string('imagen');
            $table->string('serial')->unique();
            $table->string('codigo_SAP')->unique();
            $table->string('valor_compra');
            $table->string('ubicacion');
            $table->string('marca');
            $table->string('fecha_ingreso');
            $table->double('valor_dia');
            $table->string('responsable');
            $table->string('observaciones')->nullable();
            $table->string('estado')->default('DISPONIBLE');
            $table->string('tipo');
            
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
