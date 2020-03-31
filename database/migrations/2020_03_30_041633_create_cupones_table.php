<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupones', function (Blueprint $table) {
            $table->id();
            $table->string("Codigo");
            $table->boolean("Acumulable")->default(false);
            $table->string("Tipo")->nullable()->default("Porcentaje")->comment("Porcentaje o cantidad exacta");
            $table->string("Reglas")->nullable()->default("Ninguna")->comment("En caso de que se necesite una regla para usarlo como que sea de un producto en especifico");
            $table->float("Cantidad")->default(0.001);
            $table->string("Condiciones")->nullable();
            $table->unsignedBigInteger("ID_User")->nullable()->comment("A quien fue dado este cupon");
            $table->boolean("transferible")->default(false);
            $table->boolean("usado")->default(false);
            $table->date("Vigencia")->nullable()->default(null);
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupones');
    }
}
