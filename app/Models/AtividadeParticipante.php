<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtividadeParticipante extends Model
{
    use HasFactory;
    protected $fillable = [
        'atividade_id',
        'participante_id',
        'perfil_id',
        'created_at',
        'updated_at',
    ];
}
