<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSQMCorreosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_q_m__correos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User");
            $table->string("Correo");
            $table->string("Alias_Al_Correo");
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')->onDelete("cascade");
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_q_m__correos');
    }
}
