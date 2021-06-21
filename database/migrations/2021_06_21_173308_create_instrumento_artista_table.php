<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrumentoArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrumento_integrante', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("instrumento_id")->index("instrumento_artista_instrumento_id_foreign");
            $table->string("integrante_rut", 9)->index("instrumento_artista_integrante_rut_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrumento_artista');
    }
}
