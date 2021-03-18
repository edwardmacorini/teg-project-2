<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTipoSangreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_sangre', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        DB::table('tipo_sangre')->insert([
            ['nombre' => 'O-'],
            ['nombre' => 'O+'],
            ['nombre' => 'A-'],
            ['nombre' => 'A+'],
            ['nombre' => 'B-'],
            ['nombre' => 'B+'],
            ['nombre' => 'AB-'],
            ['nombre' => 'AB+'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_sangre');
    }
}
