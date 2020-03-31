<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosDigitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos__digitales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo tiene")->nullable();
            $table->unsignedBigInteger("ID_Ticket")->nullable()->default(null);
            $table->unsignedBigInteger("ID_Var_Producto")->nullable();
            $table->string("path")->default("");
            $table->boolean("Verificado")->default(false);
            $table->timestamps();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->foreign('ID_Var_Producto')->references('id')->on('variaciones_producto')->onDelete('set null'); 
            $table->foreign("ID_Ticket")->references("id")->on('tickets')->onDelete("set null");
        });
    } 
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos__digitales');
    }
}
