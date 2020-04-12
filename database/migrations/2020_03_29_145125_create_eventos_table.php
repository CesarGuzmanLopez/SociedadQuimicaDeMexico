<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre_Evento");
            $table->string("Hubicacion")->nullable();
            $table->float("Cordenada_X")->nullable();
            $table->float("Cordenada_Y")->nullable();
            $table->unsignedBigInteger("ID_Publicacion")->nullable();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que dio de alta el evento")->nullable();
            $table->dateTimeTz("Fecha_inicio")->nullable();
            $table->dateTime("Fecha_fin")->nullable();  
            $table->timestamps(); 
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('set null'); 
            $table->foreign('ID_Publicacion')
            ->references('id')->on('Publicaciones')
            ->onDelete('set null');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
