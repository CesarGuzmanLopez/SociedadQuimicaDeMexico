<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string("Categoria");
            $table->string("Comentarios")->nullable();
            $table->unsignedBigInteger("ID_User")->nullable();
            $table->unsignedBigInteger("ID_Permiso")->comment("El permiso que debe tener un usuario")->nullable();
            $table->timestamps();
           
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('set null');
            
            $table->foreign("ID_Permiso")->references("id")->on('permissions')->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
