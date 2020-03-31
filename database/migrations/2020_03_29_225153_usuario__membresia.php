<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioMembresia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuario_Membresia', function (Blueprint $table) {
 
            $table->unsignedBigInteger("ID_User");
            $table->unsignedBigInteger("ID_Membresia");
            
            $table->date("Inicio");
            $table->date("Fin"); 
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->cascadeOnDelete(); 
            
            $table->foreign('ID_Membresia')
            ->references('id')->on('membresias')
            ->cascadeOnDelete();
            $table->primary(['ID_User','ID_Membresia']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Usuario_Membresia');
        
    }
}
