<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritosCongresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscritos__congresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que se inscribio")->nullable();
            $table->unsignedBigInteger("ID_Ticket")->nullable()->default(null);
            $table->unsignedBigInteger("ID_Congreso")->nullable();
            $table->boolean("Verificado")->default(false);
            $table->timestamps();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->foreign('ID_Congreso')->references('id')->on('congresos')->onDelete('set null');
         
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
        Schema::dropIfExists('inscritos__congresos');
    }
}
