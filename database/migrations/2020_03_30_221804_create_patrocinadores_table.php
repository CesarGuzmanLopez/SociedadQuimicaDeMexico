<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatrocinadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patrocinadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->unsignedBigInteger("ID_Usuario_Contacto")->nullable()->default(null);
            $table->unsignedBigInteger("ID_Pagina_Interna")->nullable()->default(null);
            $table->string("Pagina_Externa")->nullable()->default(null);
            $table->string("path_Images"); 
            $table->string("Nombre_Patrocinador")->unique();
            $table->string("Tipo")->default("Patrocinador")->nullable(); 
            $table->text("Descripcion");             
            $table->text("Datos de contacto");
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->foreign('ID_Usuario_Contacto')->references('id')->on('users')->onDelete('set null'); 
            $table->foreign('ID_Pagina_Interna')->references('id')->on('paginas')->onDelete('set null');
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
        Schema::dropIfExists('patrocinadores');
    }
}
