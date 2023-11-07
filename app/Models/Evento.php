<?php

namespace App\Models;

use App\Models\Atividade;
use App\Models\Participante;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificado\ConfigCertificado;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function configCertificados()
    {
        return $this->hasMany(ConfigCertificado::class);
    }

    public function participantes()
    {
        $participantes = $this->atividades()->with('participantes')->get()->pluck('participantes')->flatten()->unique('id')->sortBy('nome');
        dd($participantes);
    dd($participantes);
        $participantes = $this->manyToMany(Participante::class, );
        return $this->hasManyThrough(Participante::class, Atividade::class);
        
        return $this->hasMany(Participante::class);
    }

    public function getParticipantes()
    {
        $particitantes = collect();
        foreach ($this->atividades as $atividade) {
            $particitantes = $particitantes->merge($atividade->participantes)->unique('id');
        }
        $particitantes = $particitantes->sortBy('nome');
        return $particitantes;
    }
}
