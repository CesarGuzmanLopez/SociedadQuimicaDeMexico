<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("chat_Conversaciones", function (Blueprint $table) {
            $table->id();
            $table->boolean('private')->default(true);
            $table->boolean('direct_message')->default(false);
            $table->text('data')->nullable();
            $table->timestamps();
        });

        Schema::create("chat_participantes", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Conversacion_id');
             $table->string('tipo_de_mensaje');
            $table->text('configuracion')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger("ID_User")->nullable();
            $table->foreign('Conversacion_id')
            ->references('id')
            ->on("chat_Conversaciones")
            ->onDelete('cascade');
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete("set null");
            
        });

        Schema::create("chat_Mensajes", function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->unsignedBigInteger('Conversacion_id')->unsigned();
            $table->unsignedBigInteger('ID_chat_participantes')->unsigned()->nullable();
            $table->string('type')->default('text');
            $table->timestamps();
            $table->dateTimeTz("Enviado"); 
            $table->foreign('ID_chat_participantes')
                ->references('id')
                ->on("chat_participantes")
                ->onDelete('set null');

            $table->foreign('Conversacion_id')
                ->references('id')
                ->on("chat_Conversaciones")
                ->onDelete('cascade');
        });

        Schema::create("chat_Notificaciones", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Mensaje')->unsigned();
             $table->string('Tipo_Mensaje');
            $table->unsignedBigInteger('ID_Conversacion')->unsigned();
            $table->unsignedBigInteger('ID_Participante')->unsigned();
            $table->boolean('visto')->default(false);
            $table->boolean('enviado')->default(false);
            $table->boolean('recibido')->default(false);
            $table->timestamps();
            $table->softDeletes();
 
            $table->foreign('ID_Mensaje')
                ->references('id')
                ->on("chat_Mensajes")
                ->onDelete('cascade');

            $table->foreign('ID_Conversacion')
                ->references('id')
                ->on("chat_Conversaciones")
                ->onDelete('cascade');

            $table->foreign('ID_Participante')
                ->references('id')
                ->on("chat_participantes")
                ->onDelete('cascade');
        });   
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("chat_Notificaciones");
        Schema::dropIfExists("chat_Mensajes");
        Schema::dropIfExists("chat_participantes");
        Schema::dropIfExists("chat_Conversaciones");
    }
}
