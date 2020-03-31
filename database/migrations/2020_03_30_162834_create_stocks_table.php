<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_Abastecedor");
            $table->unsignedBigInteger("ID_Variacion_Producto");
            $table->bigInteger("Numero_De_Piezas")->default(0);
            $table->float("Precio_Producto_Abastecido");
            $table->float("Precio_Producto_A_Venta")->nullable();
            $table->float("Precio_Minimo")->nullable();
            $table->float("Precio_Maximo")->nullable();
            $table->bigInteger("Piezas_minimas")->nullable(); 
            $table->bigInteger("Piezas_Maximas")->nullable();
            $table->timestamps();
            //llaves
            $table->foreign("ID_Variacion_Producto")->references('id')->on('variaciones_producto')->cascadeOnDelete();
            $table->foreign("ID_Abastecedor")->references('id')->on('abastecedores')->cascadeOnDelete();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
