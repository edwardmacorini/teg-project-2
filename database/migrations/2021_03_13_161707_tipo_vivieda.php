<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TipoVivieda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoVivienda', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });

        DB::table('tipoVivienda')->insert([
            ['nombre' => 'casa'],
            ['nombre' => 'apartamento'],
            ['nombre' => 'rancho']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoVivienda');
    }
}
