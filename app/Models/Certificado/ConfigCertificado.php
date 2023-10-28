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

    public function participantesDisponiveisParaCertificacao()
    {
        return Evento::find($this->evento_id)->participantes;
    }

}
