<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnsArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artista', function (Blueprint $table) {
            $table->string("imagen", 250)->nullable();
            $table->string("instagram", 100)->nullable();
            $table->string("facebook", 100)->nullable();
            $table->string("twitter", 100)->nullable();
            $table->string("spotify", 100)->nullable();
            $table->string("youtube", 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artista', function (Blueprint $table) {
            //
        });
    }
}
