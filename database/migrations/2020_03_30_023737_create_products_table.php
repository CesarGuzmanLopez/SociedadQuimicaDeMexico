<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {      
        Schema::create('Tipos_Productos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment("tipo de porducto ej.Virtual Tasa Joyeria");
            $table->string('slug')->unique();
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('details')->nullable();
            $table->integer('price');
            $table->text('description');
            $table->text("images");
            $table->integer("Cantidad_Productos")->default(1);
            
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger("ID_User")->nullable()->comment("usuario que subio el producto"); 
            $table->unsignedBigInteger("ID_Tipo");
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('ID_Tipo')
            ->references('id')->on('Tipos_Productos')
            ->onDelete('cascade');
        });
        Schema::create('variaciones_producto', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger("ID_Producto");
            $table->string('Nombre'); 
            $table->string("categoria");
            $table->string("Comentarios")->nullable();
            $table->string("imagenes"); 
            $table->timestamps(); 
        });
        Schema::create('Paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string("imagenes");
            $table->boolean("Publico")->default(true)->comment("Paquete_Que_sirve para administracion interna");
            $table->unsignedBigInteger("ID_User")->nullable()->comment("usuario que subio el producto"); 
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
        Schema::create('Productos_En_Paquetes', function (Blueprint $table) {
           
            $table->unsignedBigInteger("ID_Variacion_Poducto");
            $table->unsignedBigInteger("ID_Paquetes"); 
            $table->string("Tipo_Variacion");
            $table->string("Valor");
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
        Schema::dropIfExists("Productos_En_Paquetes");
        Schema::dropIfExists("Paquetes");
        Schema::dropIfExists("variaciones_producto");
        Schema::dropIfExists('products');
        Schema::dropIfExists('Tipos_Productos');
   

    }
}
