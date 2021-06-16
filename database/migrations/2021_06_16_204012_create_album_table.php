<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->integer("artista_id")->index("album_artista_artista_id_foreign");
            $table->string("ALB_Nombre", 30);
            $table->integer("ALB_CantCanciones");
            $table->date("ALB_FechaLanzamiento");
            $table->string("imagen", 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
