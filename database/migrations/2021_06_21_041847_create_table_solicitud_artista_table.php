<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSolicitudArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_artista', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('artista_id')->index("solicitud_artista_artista_id_foreign");
            $table->string("observacion", 255);
            $table->integer("estado");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_solicitud_artista');
    }
}
