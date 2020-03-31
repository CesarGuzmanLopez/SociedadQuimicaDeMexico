<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CalificacionRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     
        Schema::create('Calificacion_Respuesta', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->comment("Usuario_Que_Califica");
            $table->unsignedBigInteger("ID_Respuesta");
            $table->integer("Calificacion");
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ID_Respuesta')->references('id')->on('Respuestas')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['user_id','ID_Respuesta']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Calificacion_Respuesta');
        
    }
}
