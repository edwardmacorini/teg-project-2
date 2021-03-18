<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapacitado extends Model
{
    use HasFactory;

    protected $table = 'discapacitado';

    protected $fillable = [
        'si_no',
        'descripcion'
    ];
}
