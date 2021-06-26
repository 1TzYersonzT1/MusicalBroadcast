<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsHojaVidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hoja_vida', function (Blueprint $table) {
           $table->renameColumn("talleres_reportados", 'talleres_aprobados');
           $table->renameColumn("eventos_reportados", 'eventos_aprobados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hoja_vida', function (Blueprint $table) {
            //
        });
    }
}
