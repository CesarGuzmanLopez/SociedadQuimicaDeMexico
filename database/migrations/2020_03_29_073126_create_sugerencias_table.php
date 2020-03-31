<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSugerenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sugerencias', function (Blueprint $table) {
            $table->id();
            $table->string("Sugerencia",1000);
            $table->string("Estado")->comment("Estado de la sugerencia revisado o no");
            $table->unsignedBigInteger("ID_Autor");
            $table->unsignedBigInteger("ID_Revisor")->nullable();
            $table->foreign('ID_Autor')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('ID_Revisor')
            ->references('id')->on('users')
            ->onDelete('set null');
            
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
        Schema::dropIfExists('sugerencias');
    }
}
