<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rif');
            $table->text('address');
            $table->string('number');
            $table->string('mail');
            $table->string('license')->nullable();
            $table->boolean('type');
            $table->timestamps();

            
            /*
            * Campo a contener por esta tabla
            * Nombre / Razon social
            * RIF
            * Numero telefonicos de la empresa
            * Emails de la empresa
            * Ubicación
            */


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
