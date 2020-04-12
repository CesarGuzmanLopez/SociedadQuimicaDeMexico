<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->string("Pais")->default("MX"); 
            $table->string("Estado");
            $table->string("Colonia");
            $table->string("Slug")->nullable()->default(null);
            $table->string("Municipio")->nullable()->default(null);
            $table->string("Comunidad")->nullable()->default(null);;
            $table->string("Codigo_Postal");
            $table->string("Calle_O_Avenida")->nullable()->default(null);
            $table->string("Numero_exterior")->nullable()->default(null);
            $table->string("Numero_interior")->nullable();
            $table->string("Referencias")->nullable(); 
            $table->unsignedBigInteger("ID_User");
            $table->timestamps();
            $table->float("latitud")->nullable();
            $table->float("longitud")->nullable(); 
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('cascade');    
        });
        
        	Schema::create('CodigoPostal', function (Blueprint $table) {
        		$table->id();
        		$table->string("Pais")->default("MX");
        		$table->string("Estado");
        		$table->string("Colonia");
        		$table->string("Municipio")->nullable()->default(null);
        		$table->string("Comunidad")->nullable()->default(null);;
        		$table->string("Codigo_Postal");
        		$table->float("latitud")->nullable()->default(null);
        		$table->float("longitud")->nullable()->default(null);
        		$table->timestamps();
        		$table->smallInteger("occuracy");
        	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	
    	Schema::dropIfExists('CodigoPostal');
        Schema::dropIfExists('direcciones');
    }
}
