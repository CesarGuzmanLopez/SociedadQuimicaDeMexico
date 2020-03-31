<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBolsaTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bolsa__trabajo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->string("Empresa");
            $table->string("Descripcion_del_Puesto")->nullable();
            $table->string("tags");
            $table->string("Localizacion")->nullable();
            $table->string("sueldo")->nullable();
            $table->string("tipo")->default("Servicio Social");
            $table->string("Horario")->nullable();
            $table->string("Puesto");
            $table->string("Contacto"); 
            $table->boolean("Se_Aceptan_Postulaciones")->default(false);
            $table->string("Data_Json");
            $table->timestamps();
        });
        Schema::create('Postulaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que se postula");
            $table->foreign('ID_User')->references('id')->on('users')->cascadeOnDelete();
            $table->string("path_curriculum");
            $table->string("Comentarios");
            $table->unsignedBigInteger("ID_Trabajo");
            $table->foreign('ID_Trabajo')->references('id')->on('bolsa__trabajo'); 
            $table->boolean("status")->default(false);
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
        Schema::dropIfExists("Postulaciones");
        Schema::dropIfExists('bolsa__trabajo');
    }
}
