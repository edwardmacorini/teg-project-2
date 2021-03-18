<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntecedentesSalud extends Model
{
    use HasFactory;

    protected $table = 'antecedentes_salud';

    protected $fillable = [
        'tipo_sangre',
        'cond_especiales',
        'antecedentes'
    ];
}
