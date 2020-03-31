<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revistas', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre_Revista");
            $table->Text("Descripcion");
            $table->date("Fecha_Expedida")->nullable();
            $table->text("Autores")->comment("separados por comas")->nullable();;
            $table->unsignedBigInteger("ID_User")->nullable()->comment("Usuario Que la da de alta");
            $table->unsignedBigInteger("ID_Categoria")->nullable();
            $table->integer("Numero_de_descargas")->default(0); 
            $table->timestamps();
            
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('set null');
            $table->foreign('ID_Categoria')
            ->references('id')->on('Categorias')
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
        Schema::dropIfExists('revistas');
    }
}
