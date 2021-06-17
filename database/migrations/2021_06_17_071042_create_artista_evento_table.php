<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistaEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artista_evento', function (Blueprint $table) {
            $table->id();
            $table->foreignId("artista_id")->index("artista_evento_artista_id_foreign");
            $table->foreignId("evento_id")->index("artista_evento_evento_id_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artista_evento');
    }
}
