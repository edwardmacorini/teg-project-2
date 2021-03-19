<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiados extends Model
{
    use HasFactory;

    protected $table = 'beneficiados';

    protected $fillable = [
        'nombre',
        'tipoCedula',
        'cedula',
        'fechaNacimiento',
        'nacionalidad',
        'sexo',
        'phone',
        'estadoCivil',
        'profesion',
        'ocupacion',
        'cantidadFamilia',
        'cantidadHijos',
        'tipoVivienda',
        'propiedad',
        'direccion',
        'situacion_economica',
        'antecedentes_salud',
        'discapacitado',
        'user_id'
    ];
}
