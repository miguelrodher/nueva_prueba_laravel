<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) 
        {
            $table->bigIncrements('id_estudiante');

            $table->string('nombre', 20);          
            $table->string('apellido_paterno', 20);      
            $table->string('apellido_materno', 20);      
            $table->smallInteger('edad');          

            $table->string('email', 50)->unique(); 
            $table->string('telefono', 10)->unique(); 

            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')->references('id_grupo')->on('grupos');

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
        Schema::dropIfExists('estudiantes');
    }
}
