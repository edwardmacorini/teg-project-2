<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Census extends Model
{
    use HasFactory;

    protected $table = 'census';

    protected $fillable = [
        'descripcion',
        'institucion',
        'estado',
        'user_id'
    ];
}
