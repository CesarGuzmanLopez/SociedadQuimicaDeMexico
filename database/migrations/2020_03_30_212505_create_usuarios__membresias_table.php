<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosMembresiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios__membresias', function (Blueprint $table) {
            $table->unsignedBigInteger("ID_User");
            $table->unsignedBigInteger("ID_Membresia");
            $table->string("Numero_Membresia");
            $table->date("Inicio");
            $table->date("Fin");
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->cascadeOnDelete();
            
            $table->foreign('ID_Membresia')
            ->references('id')->on('membresias')
            ->cascadeOnDelete();
            $table->primary(['ID_User','ID_Membresia']);
            $table->unsignedBigInteger("ID_Ticket")->nullable()->default(null); 
            $table->timestamps();
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
        Schema::dropIfExists('usuarios__membresias');
    }
}
