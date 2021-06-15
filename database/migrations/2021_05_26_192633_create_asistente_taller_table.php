<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenteTallerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistente_taller', function (Blueprint $table) {
            $table->id();
            $table->string("asistente_rut", 9);
            $table->foreign("asistente_rut")->references("rut")->on("asistente");
            $table->foreignId("taller_id")->constrained("taller");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistente_taller');
    }
}
