<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaginasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paginas', function (Blueprint $table) {
            $table->id(); 
            $table->string("Descripcion");
            $table->string("Tipo_Pagina");
            $table->string("tipo_Texto");
            $table->string("url_relativa")->nullable();
            $table->longText("Data")->comment("Datos que lleva la pagina")->nullable();
            $table->string("Localizacion_Interna")->nullable();
            $table->boolean("Activa");
            $table->unsignedBigInteger("ID_User")->nullable();    
            $table->timestamps();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable(); 
            $table->foreign('ID_User')
            ->references('id')->on('users')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paginas');
    }
}
