<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EstadoCivil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estadoCivil', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
        });

        DB::table('estadoCivil')->insert([
            ['nombre' => 'soltero'],
            ['nombre' => 'casado'],
            ['nombre' => 'divorsiado'],
            ['nombre' => 'viudo'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadoCivil');
    }
}
