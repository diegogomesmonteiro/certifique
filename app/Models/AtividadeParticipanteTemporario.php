<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtividadeParticipanteTemporario extends Model
{
    use HasFactory;

    protected $fillable = [
        'atividade',
        'participante_nome',
        'participante_cpf',
        'participante_email',
        'importacao_concluida',
    ];

}
