<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->float("Costo");
            $table->string("Duracion");
            $table->date("Inicio_Disponibilidad")->nullable();
            $table->date("fin_disponibilidad")->nullable();
            $table->unsignedBigInteger("ID_Rol_A_Recibir");
            $table->unsignedBigInteger("ID_Rol_A_Necesario")->nullable();
            $table->unsignedBigInteger("ID_Rol_Incopatible")->nullable();
            $table->boolean("Activo");
            $table->unsignedBigInteger("ID_User");
            $table->timestamps();
            
            
            $table->foreign('ID_Rol_A_Recibir')
            ->references('id')->on('roles')
            ->onDelete('cascade');
            
            $table->foreign('ID_Rol_A_Necesario')
            ->references('id')->on('roles')
            ->onDelete('set null');
            
            $table->foreign('ID_Rol_Incopatible')
            ->references('id')->on('roles')
            ->onDelete('set null');
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('cascade'); 
        });
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
        Schema::dropIfExists('membresias');
    }
}
