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
            $table->string('tipoCedula');
            $table->string('cedula');
            $table->string('fechaNacimiento');
            $table->string('nacionalidad');
            $table->boolean('sexo');
            $table->integer('estadoCivil');
            $table->string('profesion');
            $table->string('ocupacion');
            $table->integer('cantidadFamilia');
            $table->integer('cantidadHijos');
            $table->integer('tipoVivienda');
            $table->integer('propiedad');
            $table->unsignedBigInteger('direccion');
            $table->foreign('direccion')->references('id')->on('direccion');
            $table->integer('situacion_economica');
            $table->unsignedBigInteger('antecedentes_salud');
            $table->foreign('antecedentes_salud')->references('id')->on('antecedentes_salud');
            $table->unsignedBigInteger('discapacitado');
            $table->foreign('discapacitado')->references('id')->on('discapacitado');
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
