<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
