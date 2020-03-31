<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbastecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abastecedores', function (Blueprint $table) {
            $table->id();
            $table->string("Nombre_Abastecedor");
            $table->string("Numero_Telefonico")->nullable()->default(null);
            $table->string("email")->nullable()->default(null);
            $table->text("Descripcion")->nullable()->default(null);
            $table->timestamps();
        });
        Schema::create('productos_en_abastecedores', function (Blueprint $table) { 
            $table->unsignedBigInteger("IDVarProd")->comment("ID de la variacion de poducto");
            $table->unsignedBigInteger("ID_Abs")->comment("ID Del Abastecedor del producto actualActual");
            $table->boolean("Disponible")->default(true);
            $table->string("Comentarios")->nullable()->default(null);
            $table->foreign("IDVarProd")->references('id')->on('variaciones_producto')->cascadeOnDelete();
            $table->foreign("ID_Abs")->references('id')->on('abastecedores')->cascadeOnDelete(); 
            $table->timestamps(); 
            $table->primary(['IDVarProd','ID_Abs']);
            
        });             
    } 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_en_abastecedores');
        Schema::dropIfExists('abastecedores');
    }
}
