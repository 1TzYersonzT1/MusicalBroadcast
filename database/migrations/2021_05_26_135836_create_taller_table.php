<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taller', function (Blueprint $table) {
            $table->id();
            $table->string("TAL_Nombre", 30);
            $table->string("TAL_Descripcion", 255);
            $table->string("TAL_Requisitos", 255);
            $table->string("TAL_Protocolo", 255);
            $table->integer("TAL_Aforo");
            $table->dateTime("TAL_Horario");
            $table->string("TAL_Lugar", 55);
            $table->string("user_rut", 9)->index("taller_user_rut_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taller');
    }
}
