<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) 
        {
            $table->bigIncrements('id_grupo');

            $table->unsignedBigInteger('id_clase');
            $table->foreign('id_clase')->references('id_clase')->on('clases');

            $table->unsignedBigInteger('id_turno');
            $table->foreign('id_turno')->references('id_turno')->on('turnos');

            $table->unsignedBigInteger('id_semestre');
            $table->foreign('id_semestre')->references('id_semestre')->on('semestres');

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
        Schema::dropIfExists('grupos');
    }
}
