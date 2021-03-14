<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SituacionEconomica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('situacion_economica', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });

        DB::table('situacion_economica')->insert([
            ['nombre' => 'alta'],
            ['nombre' => 'media'],
            ['nombre' => 'baja'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('situacion_economica');
    }
}
