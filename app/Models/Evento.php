<?php

namespace App\Models;

use App\Models\Atividade;
use App\Enums\EventoTipoEnum;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificado\ConfigCertificado;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
        'data_inicio',
        'data_fim',
        'carga_horaria',
        'local',
    ];

    protected $casts = [
        'tipo' => EventoTipoEnum::class,
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
