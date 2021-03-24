<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Beneficiados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('tipoCedula', 1);
            $table->string('cedula', 9);
            $table->date('fechaNacimiento');
            $table->string('nacionalidad');
            $table->string('sexo');
            $table->string('estadoCivil');
            $table->string('profesion')->nullable();
            $table->string('ocupacion');
            $table->integer('cantidadFamilia');
            $table->integer('cantidadHijos');
            $table->string('tipoVivienda');
            $table->string('propiedad');
            $table->string('phone');
            $table->unsignedBigInteger('direccion');
            $table->foreign('direccion')->references('id')->on('direccion');
            $table->string('situacion_economica');
            $table->unsignedBigInteger('antecedentes_salud');
            $table->foreign('antecedentes_salud')->references('id')->on('antecedentes_salud');
            $table->unsignedBigInteger('discapacitado');
            $table->foreign('discapacitado')->references('id')->on('discapacitado');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiados');
    }
}
