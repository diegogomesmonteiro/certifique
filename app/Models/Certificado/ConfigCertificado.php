<?php

namespace App\Models\Certificado;

use App\Models\Evento;
use App\Models\Atividade;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TipoConfigCertificadoEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConfigCertificado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'evento_id',
        'atividade_id',
        'layout',
        'texto',
        'tipo',
    ];

    protected $casts = [
        'tipo' => TipoConfigCertificadoEnum::class,
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function atividade()
    {
        return $this->belongsTo(Atividade::class);
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function participantesDisponiveisParaCertificacao()
    {
        $certificados = $this->certificados;
        $participantesCertificados = $certificados->pluck('participante');
        if ($this->tipo == TipoConfigCertificadoEnum::GERAL) {
            $participantes = $this->evento->getParticipantes();
        } else if ($this->tipo == TipoConfigCertificadoEnum::ATIVIDADE) {
            $participantes = $this->atividade->participantes;
        }
        $participantesNaoCertificados = $participantes->whereNotIn('id', $participantesCertificados->pluck('id'));
        return $participantesNaoCertificados;
    }

    public function getPathLayout()
    {
        if ($this->layout == null) return null;
        if ($this->layout == 'img/certificado.jpg') {
            return 'img/certificado.jpg';
        }
        return 'storage/img/layout-certificados/' . $this->evento_id . "/" . $this->layout;
    }
}
