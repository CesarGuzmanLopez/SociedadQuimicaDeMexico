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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
}
