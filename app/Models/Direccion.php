<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direccion';

    protected $fillable = [
        'avenida',
        'sector',
        'estado',
        'municipio',
        'parroquia',
        'ciudad',
        'zonaPostal',
        'referencia'
    ];
}
