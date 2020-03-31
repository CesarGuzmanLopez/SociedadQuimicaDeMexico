<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descuentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_Rol_Descuento")->nullable()->default(null);
            $table->unsignedBigInteger("ID_Usuario_Aplica")->nullable()->default(null);
            $table->string("Clasificacion")->comment("Especifico para un Prodcuto")->default("todos");
            $table->unsignedBigInteger("Paquetes_No_Aplica")->nullable()->default(null);
            $table->unsignedBigInteger("Paquetes_Aplica")->nullable()->default(null);
            $table->float("Cantidad_Maxima_descuento");
            $table->float("Cantidad_Minima_Descuento");
            $table->date("Inicia_del_descuento");
            $table->date("fin_del descuento");
            $table->String("tipoDescuento")->default("Porcentaje");
            $table->float("Cantidad")->default(0.0);
            $table->timestamps();
            $table->boolean("Acumulable")->default(false); 
            $table->foreign("ID_Rol_Descuento")->references("id")->on("roles")->cascadeOnDelete();
            $table->foreign("ID_Usuario_Aplica")->references("id")->on("users")->cascadeOnDelete();
            $table->foreign("Paquetes_No_Aplica")->references("id")->on("Paquetes")->cascadeOnDelete();
            $table->foreign("Paquetes_Aplica")->references("id")->on("Paquetes")->cascadeOnDelete();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descuentos');
    }
}
