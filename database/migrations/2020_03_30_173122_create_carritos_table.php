<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->nullable();
            $table->string("Tipo")->default("Compra")->comment("Tipo de carrito o deso");
            $table->string("token")->nullable()->unique();  
            $table->timestamps();
            $table->foreign("ID_User")->references("id")->on("users");
            
        });
        Schema::create('Productos_en_carrito', function(Blueprint $table){
            $table->unsignedBigInteger("ID_Carrito");
            $table->unsignedBigInteger("ID_Var_Prod");
            $table->string("Personalizacion")->nullable();
            $table->string("Comentarios")->nullable();
            $table->dateTime("Expira")->nullable();      
            $table->integer("Numero_de_Productos");
            $table->timestamps();
            $table->foreign("ID_Carrito")->references("id")->on("carritos") ->cascadeOnDelete();
            $table->foreign("ID_Var_Prod")->references("id")->on("variaciones_producto")->cascadeOnDelete();
        });   
    } 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("Productos_en_carrito");
        Schema::dropIfExists('carritos');
    }
}
