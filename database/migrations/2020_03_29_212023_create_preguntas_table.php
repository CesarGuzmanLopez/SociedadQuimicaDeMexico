<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->nullable();
            $table->string("Estado_Mensaje")->nullable()->comment("Ha sido venviada  es visible");
            $table->text("Pregunta");
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete("set null"); 
        });
        	Schema::create('respuestas', function (Blueprint $table) {
        		$table->id();
        		$table->unsignedBigInteger("ID_user")->nullable()->comment("Usuario que responder");
        		$table->unsignedBigInteger("ID_Pregunta");
        		$table->text("Respuesta_Pregunta");
        		$table->string("fuente");
        		$table->timestamps();
        		
        		$table->foreign('ID_Pregunta')
        		->references('id')->on('Preguntas')
        		->cascadeOnDelete();
        		$table->foreign('ID_User')
        		->references('id')->on('users')
        		->onDelete('set null');; 
        	});
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
    	Schema::dropIfExists('respuestas');
    	
        Schema::dropIfExists('preguntas');
    }
}
