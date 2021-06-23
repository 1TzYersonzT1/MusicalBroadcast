<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCancionTableColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cancion', function (Blueprint $table) {
            $table->dropColumn("CAN_Duracion");
            $table->dropColumn("CAN_Compositor");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cancion', function (Blueprint $table) {
            //
        });
    }
}
