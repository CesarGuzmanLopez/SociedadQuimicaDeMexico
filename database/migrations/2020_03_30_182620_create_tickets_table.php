<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->longText("Json_Data");
            $table->float("Precio_Final");
            $table->float("Descuento");
            $table->text("Descripcion");
            $table->unsignedBigInteger("ID_Cupon")->nullable()->default(null);
            $table->unsignedBigInteger("ID_Descuento")->nullable()->default(null);
            $table->unsignedBigInteger("ID_User")->nullable()->default(null) ;
            $table->foreign("ID_Cupon")->references("id")->on("cupones")->onDelete('set null');
            $table->foreign("ID_Descuento")->references("id")->on("Descuentos")->onDelete('set null');; 
            $table->foreign("ID_User")->references("id")->on("users")->onDelete('set null'); 
            $table->timestamps();
        });
        Schema::create('Lista_Ticket_Productos', function (Blueprint $table) {
            $table->unsignedBigInteger("ID_Ticket");
            $table->unsignedBigInteger("ID_Var_Prod");
            $table->primary(['ID_Ticket','ID_Var_Prod']);
            $table->string("Personalizacion")->nullable();
            $table->string("Comentarios")->nullable();
            $table->integer("Numero_de_Productos")->nullable();
            $table->timestamps(); 
            $table->float("Costo");
            $table->float("Descuento");
            $table->foreign("ID_Ticket")->references("id")->on("tickets")->cascadeOnDelete();
            $table->foreign("ID_Var_Prod")->references("id")->on("variaciones_producto"); 
        });
        Schema::create('Compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("ID_Ticket");
            $table->string("Direccion");
            $table->unsignedBigInteger("status");
            $table->text("info_entrega");
            $table->date("Salida_Producto")->nullable()->onDelete();;
            $table->date("Entrega_Producto")->nullable(); 
            $table->boolean("Entregado");
            $table->string("Marca_Paqueteria");
            $table->timestamps();
            $table->foreign("ID_Ticket")->references("id")->on("tickets")->cascadeOnDelete(); 
        });
                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Compra'); 
        Schema::dropIfExists('Lista_Ticket_Productos');
        Schema::dropIfExists('tickets');
    }
}
