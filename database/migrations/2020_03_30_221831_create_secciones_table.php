<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones_SQM', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger("ID_Pagina_Interna")->nullable()->default(null);
            $table->foreign('ID_Pagina_Interna')->references('id')->on('paginas')->onDelete('set null');
            $table->string("path_Images")->nullable();
            $table->string("tipo")->default("Estudiantil");
            $table->text("Descripcion");  
            $table->date("Inicio");
            $table->date("fin")->nullable()->default(null);
            $table->string("Nombre_Seccion");            
            $table->unsignedBigInteger("Presidente")->nullable()->default(null);
            $table->unsignedBigInteger("Vicepresidente")->nullable()->default(null);
            $table->unsignedBigInteger("Secretario")->nullable()->default(null);
            $table->unsignedBigInteger("Prosecretario")->nullable()->default(null);
            $table->unsignedBigInteger("Tesorero")->nullable()->default(null);
            $table->unsignedBigInteger("Protesorero")->nullable()->default(null);
            $table->unsignedBigInteger("Vocal_1")->nullable()->default(null);
            $table->unsignedBigInteger("Vocal_2")->nullable()->default(null);
            $table->unsignedBigInteger("Vocal_3")->nullable()->default(null);
            $table->unsignedBigInteger("Vocal_4")->nullable()->default(null);
            $table->unsignedBigInteger("Vocal_5")->nullable()->default(null);
            $table->unsignedBigInteger("Vocal_6")->nullable()->default(null);
            $table->unsignedBigInteger("Profesor_Tutor_1")->nullable()->default(null);
            $table->unsignedBigInteger("Profesor_Tutor_2")->nullable()->default(null);
            $table->unsignedBigInteger("Profesor_Tutor_3")->nullable()->default(null);         
            $table->timestamps(); 
            $table->foreign('Presidente')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Vicepresidente')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Secretario')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Tesorero')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Prosecretario')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Vocal_1')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Vocal_2')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Vocal_3')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Vocal_4')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Vocal_5')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Vocal_6')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Profesor_Tutor_1')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Profesor_Tutor_2')->references('id')->on('users')->onDelete('set null');
            $table->foreign('Profesor_Tutor_3')->references('id')->on('users')->onDelete('set null');
        });
        Schema::create('tipo_Participante_seccion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->string("Descripcion_Corta")->nullable()->default("Participante seccion estudiantil");
            $table->string("Nombre_Rango")->unique();
            $table->timestamps();
        });
        
        Schema::create('Participante_Seccion', function (Blueprint $table) { 
            $table->id();
            $table->unsignedBigInteger("ID_User_alta")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User_alta')->references('id')->on('users')->onDelete('set null'); 
            $table->unsignedBigInteger("ID_tipo_Participante")->nullable()->default(0);
            $table->foreign('ID_tipo_Participante')->references('id')->on('tipo_Participante_seccion')->onDelete('set null'); 
            $table->unsignedBigInteger("ID_User")->comment("Usuario que sera colaborador")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null'); 
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
        Schema::dropIfExists("Participante_Seccion");
        Schema::dropIfExists("tipo_Participante_seccion");
        Schema::dropIfExists('secciones_SQM');
    }
}
