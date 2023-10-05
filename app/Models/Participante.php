<?php

namespace App\Models;

use App\Models\Perfil;
use App\Models\Atividade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'nome', 
        'email', 
        'cpf',
    ];

    public function atividades()
    {
        return $this->belongsToMany(Atividade::class, 'atividade_participantes');
    }

    public function perfils()
    {
        return $this->belongsToMany(Perfil::class, 'atividade_participantes');
    }
    
    public function perfilsNaAtividade(Atividade $atividade)
    {
        return $this->perfils()->where('atividade_id', $atividade->id)->get();
    }

}
