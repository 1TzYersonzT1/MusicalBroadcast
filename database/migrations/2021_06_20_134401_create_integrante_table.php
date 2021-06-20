<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegranteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrante', function (Blueprint $table) {
            $table->string("rut", 9)->primary();
            $table->bigInteger("artista_id")->constrained("artista")->index("integrante_artista_id_foreign");
            $table->string("nombre", 30);
            $table->string("apellidos", 40);
            $table->string("imagen")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integrante');
    }
}
