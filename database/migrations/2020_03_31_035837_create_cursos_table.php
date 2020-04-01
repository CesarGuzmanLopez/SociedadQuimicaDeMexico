<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger("ID_Usuario_Responsable_Curso")->nullable();
            $table->foreign('ID_Usuario_Responsable_Curso')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger("ID_Prodcuto")->nullable()->default(null)->comment("Producto en la tienda por si tiene costo");
            $table->foreign('ID_Prodcuto')->references('id')->on('variaciones_producto')->onDelete('set null');
            $table->string("Nombre_del_curso")->unique();
            $table->longText("Descripcion_Curso")->nullable()->default(null);
            $table->unsignedBigInteger("ID_pagina")->nullable()->default(null);
            $table->foreign('ID_pagina')->references('id')->on('paginas')->onDelete('set null');
            $table->string("path_Pagina");
            $table->String("linea_de_tendencia"); 
            $table->timestamps();
            $table->boolean("Pagado")->default(false);
            $table->string("tipo_Cuso")->nullable()->default("Online")->comment("webinar por default osea online"); 
            $table->date("dia_inicia");
            $table->date("Dia_Finaliza");
            $table->string("Hubicacion")->nullable()->default(null);
        });
        Schema::create('Asistentes_Cursos', function (Blueprint $table) {
            $table->unsignedBigInteger("ID_User")->comment("Usuario que tomara el curso")->nullable(); 
            $table->foreign('ID_User')->references('id')->on('users')->cascadeOnDelete(); 
            $table->unsignedBigInteger("ID_Curso"); 
            $table->foreign('ID_Curso')->references('id')->on('cursos')->cascadeOnDelete();
            $table->string("dataJson")->nullable()->default(null);
            $table->unsignedBigInteger("id_Toket")->nullable()->default(null);
            $table->foreign('id_Toket')->references('id')->on('tickets')->cascadeOnDelete(); 
            
            $table->primary(['ID_User','ID_Curso']); 
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
        Schema::dropIfExists("Asistentes_Cursos");
        Schema::dropIfExists('cursos');
    }
}
