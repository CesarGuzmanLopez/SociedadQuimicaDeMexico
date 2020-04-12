<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tarea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	
    	
    	Schema::create('Productos', function (Blueprint $table) {
    		$table->unsignedBigInteger("idProducto")->primary();
    		
    	});
    	
    	
    	Schema::create('Provedores', function (Blueprint $table) {
  			$table->unsignedBigInteger("IdProvedor");
  			$table->string("NombreCampaña");
  			$table->string("NombrContacto");
  			$table->string("CargoContacto");
  			$table->string("Dirección");
  			$table->string("Cidu");
  			$table->string();
  			$table->string();
  			$table->string();
  			
    		
    	});
    	Schema::create('Categorias', function (Blueprint $table) {
    	});
   
    	Schema::create('Detalles_de_pedidos', function (Blueprint $table) {
    	});
    			
    	Schema::create('Pedidos', function (Blueprint $table) {
    	});
    	Schema::create('Empleados', function (Blueprint $table) {
    	});
    	Schema::create('Clientes', function (Blueprint $table) {
    	});
    	Schema::create('Campañas_de_envios', function (Blueprint $table) {
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
 
    	
    }
}
