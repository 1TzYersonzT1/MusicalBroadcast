<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHojaVidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoja_vida', function (Blueprint $table) {
            $table->id();
            $table->string("user_rut", 9)->index("hoja_vida_user_rut_foreign");
            $table->integer("talleres_rechazados");
            $table->integer("talleres_reportados");
            $table->integer("eventos_rechazados");
            $table->integer("eventos_reportados");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoja_vida');
    }
}
