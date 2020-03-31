<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
            Schema::create('menu_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('menu_id')->nullable();
                $table->string('title');
                $table->string('url');
                $table->string('target')->default('_self');
                $table->string('icon_class')->nullable();
                $table->string('color')->nullable();
                $table->integer('parent_id')->nullable();
                $table->integer('order');
                $table->string('route')->nullable()->default(null);
                $table->text('parameters')->nullable()->default(null);
                
                $table->timestamps();
            });
            Schema::table('menu_items', function (Blueprint $table) {
                $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('menus');
     }
}
