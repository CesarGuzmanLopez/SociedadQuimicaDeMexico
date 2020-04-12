<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicacionesTable extends Migration
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
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id()->comment("Datos_de_Publicaciones_en_Pagina");
            $table->string("Titulo_Publicacion");
            $table->string("Ruta_Relativa");
            $table->string("Tags");
            $table->string("Funte_de_Publicacion");
            $table->string("Data",2000);
            $table->date("Publicacion");
            $table->date("Vigencia");
            $table->boolean("Activa");
            $table->unsignedBigInteger("ID_User")->nullable();
            $table->unsignedBigInteger("ID_Categoria")->nullable();
            $table->timestamps();
            
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('set null');
            $table->foreign('ID_Categoria')
            ->references('id')->on('categorias')
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
        Schema::dropIfExists('publicaciones');
        Schema::dropIfExists('categorias');
        
    }
}
