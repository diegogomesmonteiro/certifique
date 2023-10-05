<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtividadeTipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

}
