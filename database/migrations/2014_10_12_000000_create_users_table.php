<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("Nombre_de_usuario")->nullable()->unique()->default(null);
            $table->string("Apellido")->nullable()->default(null);
            $table->string("Telefono")->nullable()->default(null);
            $table->date("Fecha_De_Nacimiento")->nullable()->default(null);
            $table->string("url_Pagina_Personal")->nullable()->default(null);
            $table->boolean("Visble_perfil")->default(FALSE);
            $table->boolean("recibir_Correos")->default(false);
            $table->float("puntos")->comment("Sistema de puntos de la pagina para ganar cosas")->default(0);
            $table->string('email')->unique()->index();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('Codigo_Confirmacion')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
