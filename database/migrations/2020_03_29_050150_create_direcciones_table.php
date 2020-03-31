<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string("Pais");
            $table->string("Direccion");
            $table->string("Codigo_Postal");
            $table->unsignedBigInteger("ID_User");
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
        });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
