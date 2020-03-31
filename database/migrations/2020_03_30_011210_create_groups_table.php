<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger("ID_User")->nullable()->comment("Creador del equipo");
            $table->unsignedBigInteger("ID_Rol")->nullable();
            $table->timestamps();
            $table->foreign('ID_User')
            ->references('id')->on('users')
            ->onDelete('cascade');
            
            $table->foreign('ID_Rol')
            ->references('id')->on('roles') 
            ->onDelete('cascade');
        });
            Schema::create('group', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('ID_User')->comment("Integrante");
                $table->unsignedBigInteger('ID_group')->nullable();
                $table->string('Nick');   
                $table->text('Posicion')->nullable()->default(null); 
                $table->timestamps();
                $table->foreign('ID_User')
                ->references('id')->on('users')
                ->onDelete('cascade');
            });
                Schema::table('group', function (Blueprint $table) {
                    $table->foreign('ID_group')->references('id')->on('groups')->onDelete('cascade');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("group");
        Schema::dropIfExists('groups');
    }
}
