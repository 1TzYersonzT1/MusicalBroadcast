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
            $table->foreignId('user_id')->constrained('user');
            $table->string('TAL_Nombre', 35);
            $table->date('TAL_Fecha');
            $table->time('TAL_Hora');
            $table->integer('TAL_Aforo');
            $table->string('TAL_Lugar', 50);
            $table->string('TAL_Requisitos', 255);
            $table->string('TAL_Protocolo', 255);
            $table->string('TAL_Descripcion', 255);
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
