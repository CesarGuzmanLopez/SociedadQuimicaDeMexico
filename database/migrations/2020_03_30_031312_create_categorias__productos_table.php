<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('categorias_de_productos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger("ID_User")->comment("Usuario Que la creo");
            
            $table->timestamps();
        });
            Schema::create('Categorias_rel_Producto', function (Blueprint $table) {
                $table->id();
                
                $table->unsignedBigInteger('ID_Producto')->unsigned()->nullable();
                $table->foreign('ID_Producto')->references('id')
                ->on('products')->onDelete('cascade');
                
                $table->unsignedBigInteger('ID_Categoria')->unsigned()->nullable();
                $table->foreign('ID_Categoria')->references('id')
                ->on('categorias_DE_Productos')->onDelete('cascade');
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
        Schema::dropIfExists("categorias_rel_Producto");
        
        Schema::dropIfExists('categorias_de_productos');
    }
}
