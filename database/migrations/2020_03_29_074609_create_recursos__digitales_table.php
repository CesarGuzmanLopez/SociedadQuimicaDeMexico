<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecursosDigitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos__digitales', function (Blueprint $table) {
            $table->id();
            $table->string("emisor")->comment("Revista pagina demas");
            $table->string("Descripcion")->nullable();
            $table->date("Fecha_Expedido")->nullable();
            $table->string("Autores")->nullable();
            $table->integer("Numero_Descargas");
            $table->string("Tipo")->nullable()->comment("especificamente por si es necesario medir el acceso");
            
            $table->unsignedBigInteger("ID_Publicacion")->nullable();
            $table->unsignedBigInteger("ID_Categoria")->nullable();
            $table->unsignedBigInteger("ID_User")->nullable();            
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')->onDelete("set null");
            $table->foreign('ID_Publicacion')
            ->references('id')->on('publicaciones')->onDelete("set null");
            $table->foreign('ID_Categoria')
            ->references('id')->on('categorias')->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recursos__digitales');
    }
}
