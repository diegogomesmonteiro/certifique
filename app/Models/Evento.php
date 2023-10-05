<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo',
        'nome',
        'descricao', 
        'data_inicio', 
        'data_fim',
    ];

    protected $casts = [
        'data_inicio' => 'datetime:d/m/Y',
        'data_fim' => 'datetime:d/m/Y',
    ];

    public function atividades()
    {
        return $this->hasMany(Atividade::class)->orderBy('data_inicio', 'asc');
    }

}
