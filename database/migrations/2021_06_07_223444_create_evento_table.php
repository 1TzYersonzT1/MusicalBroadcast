<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string("user_rut", 9)->index("evento_user_rut_foreign");
            $table->string("EVE_Nombre", 30);
            $table->string("EVE_Descripcion", 255);
            $table->dateTime("EVE_Horario");
            $table->string("EVE_Lugar", 40);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento');
    }
}
