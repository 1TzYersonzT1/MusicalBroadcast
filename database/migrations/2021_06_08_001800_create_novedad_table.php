<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedad', function (Blueprint $table) {
            $table->id();
            $table->string("titulo", 30);
            $table->string("descripcion", 255);
            $table->dateTime("horario_publicacion");
            $table->string("user_rut", 9)->index("novedad_user_rut_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novedad');
    }
}
