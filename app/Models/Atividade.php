<?php

namespace App\Models;

use App\Models\Perfil;
use App\Models\Participante;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificado\ConfigCertificado;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Atividade extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'atividade_tipo_id',
        'carga_horaria',
        'data_inicio',
        'data_fim',
        'evento_id',
    ];

    protected $casts = [
        'data_inicio' => 'datetime:d/m/Y',
        'data_fim' => 'datetime:d/m/Y',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function participantes()
    {
        return $this->belongsToMany(Participante::class, 'atividade_participantes')
            ->distinct('participantes.id')->orderBy('nome');
    }

    public function configCertificados()
    {
        return $this->hasMany(ConfigCertificado::class, 'atividade_id');
    }

    public function perfils()
    {
        return $this->belongsToMany(Perfil::class, 'atividade_participantes')->orderBy('nome');
    }

    public function atividadeTipo()
    {
        return $this->belongsTo(AtividadeTipo::class)->orderBy('nome');
    }
}
