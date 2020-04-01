<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistemaEleccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Elecciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null'); 
            $table->string("Nombre_Eleccion"); 
            $table->unsignedBigInteger("Id_Pagina")->nullable()->default(null);
            $table->foreign('Id_Pagina')->references('id')->on('paginas')->onDelete('set null');
            $table->string("Descripcion")->nullable()->default(null);
            $table->date("Dia_De_Publicacion")->nullable();
            $table->date("Dia_De_Inicio_Eleccion")->nullable();
            $table->date("Dia_fin_Votacion_Eleccion")->nullable(); 
            $table->timestamps();
        });
        Schema::create("Elecciones_Eleccion", function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null'); 
            $table->string("Votacion_Nombre")->comment("Por que se votara");
            $table->string("Descripcion");
            $table->unsignedBigInteger("Id_Pagina")->nullable()->default(null);
            $table->foreign('Id_Pagina')->references('id')->on('paginas')->onDelete('set null'); 
            $table->timestamps();
        });
        //lista de opciones ta sea cabdudati i ya sea opciones aqui se deja claro
        Schema::create("Elecciones_lista_cand_opc", function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null'); 
            $table->string("TipoCandidato")->default("Persona")->comment("En caso de que por otra cosa");
            $table->unsignedBigInteger("Id_Pagina")->nullable()->default(null);
            $table->foreign('Id_Pagina')->references('id')->on('paginas')->onDelete('set null');
            $table->unsignedBigInteger("Id_Votacion");
            $table->foreign('Id_Votacion')->references('id')->on('Elecciones_Eleccion')->cascadeOnDelete(); 
            $table->timestamps();
        });
        Schema::create("Elecciones_candidatos", function(Blueprint $table){
            
            $table->id();
            $table->unsignedBigInteger("ID_Candidato")->comment("candidato");
            $table->foreign('ID_Candidato')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger("ID_lista")->comment("ID lista que contiene las opciones por las que se votaran en la eleccion ");
            $table->foreign('ID_lista')->references('id')->on('Elecciones_lista_cand_opc')->cascadeOnDelete();
            $table->index(['ID_Candidato','ID_lista']);
            $table->timestamps();
        });
        Schema::create("Elecciones_opcion", function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null'); 
            $table->unsignedBigInteger("Id_Pagina")->nullable()->default(null);
            $table->foreign('Id_Pagina')->references('id')->on('paginas')->onDelete('set null'); 
            $table->longText("Descripcion"); 
            $table->timestamps();
        });
        Schema::create("Elecciones_opciones", function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("ID_opcion")->comment("Elecciones_opcion a votar");
            $table->foreign('ID_opcion')->references('id')->on('Elecciones_opcion')->cascadeOnDelete();
            $table->unsignedBigInteger("ID_lista")->comment("ID lista candidato Elecciones_opcion");
            $table->foreign('ID_lista')->references('id')->on('Elecciones_lista_cand_opc')->cascadeOnDelete();
            $table->index(['ID_opcion','ID_lista']); 
            $table->timestamps(); 
        });
        Schema::create("Elecciones_Lista_Votantes", function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("ID_User")->comment("Usuario que lo da de alta")->nullable();
            $table->foreign('ID_User')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger("Id_Votacion");
            $table->foreign('Id_Votacion')->references('id')->on('Elecciones_Eleccion')->cascadeOnDelete();
            $table->string("Descripcion");
            $table->boolean("Activa")->default(false);
            $table->timestamps();
        });
        Schema::create("Elecciones_Votantes", function(Blueprint $table){ 
            $table->unsignedBigInteger("ID_Lista_votantes");
            $table->foreign('ID_Lista_votantes')->references('id')->on('Elecciones_Lista_Votantes')->cascadeOnDelete(); 
            $table->unsignedBigInteger("ID_User")->comment("Votante"); 
            $table->foreign('ID_User')->references('id')->on('users')->cascadeOnDelete(); 
            $table->string("Voto_Encriptado")->nullable()->unique()->default(null)->comment("Si es secreto el voto no se guarda");
            $table->string("password");
            $table->timeTz("Tiempo_Voto")->nullable()->default(null);
            $table->primary(['ID_Lista_votantes','ID_User']); 
            $table->timestamps();
            $table->boolean("Aceptado");
        });
        Schema::create("Elecciones_Urnas", function(Blueprint $table){
            $table->id();
            $table->string("llave_Privada");
            $table->unsignedBigInteger("Id_Votacion");
            $table->foreign('Id_Votacion')->references('id')->on('Elecciones_Eleccion')->cascadeOnDelete(); 
            $table->timestamps(); 
        });
        Schema::create("Elecciones_Votos_en_urna", function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger("id_urna"); 
            
            $table->foreign('id_urna')->references('id')->on('Elecciones_Urnas')->cascadeOnDelete();
            
            
            $table->string("Voto_Encriptado")->unique()->comment("Si es secreto el voto no se guarda en usuario"); 
          
             
            $table->unsignedBigInteger("ID_opciones")->nullable()->default(null);
            $table->foreign("ID_opciones")->references("id")->on("Elecciones_opciones");
            
            
            $table->unsignedBigInteger("ID_candidatos")->nullable()->default(null);
            $table->foreign("ID_candidatos")->references("id")->on("Elecciones_candidatos");
            
            $table->index(['id_urna','Voto_Encriptado']); 
        });
        Schema::create("Elecciones_Observadores", function(Blueprint $table){ 
            $table->unsignedBigInteger("ID_User")->comment("observador");;
            $table->foreign('ID_User')->references('id')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger("id_urna")->comment("observador");;
            $table->foreign('id_urna')->references('id')->on('Elecciones_Votos_en_urna')->cascadeOnDelete(); 
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
        Schema::dropIfExists("Elecciones_Observadores");
        Schema::dropIfExists("Elecciones_Votos_en_urna");
        Schema::dropIfExists("Elecciones_Urnas");
        Schema::dropIfExists("Elecciones_Votantes");
        Schema::dropIfExists("Elecciones_Lista_Votantes").
        Schema::dropIfExists("Elecciones_opciones");
        Schema::dropIfExists("Elecciones_opcion");
        Schema::dropIfExists("Elecciones_Propuestas");
        Schema::dropIfExists("Elecciones_candidatos");
        Schema::dropIfExists("Elecciones_lista_cand_opc");
        Schema::dropIfExists('Elecciones_Eleccion');
        Schema::dropIfExists('Elecciones');
        
    }
}
