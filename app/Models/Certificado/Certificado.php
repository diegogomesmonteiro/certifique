<?php

namespace App\Models\Certificado;

use App\Models\User;
use App\Models\Participante;
use Illuminate\Database\Eloquent\Model;
use App\Models\Certificado\ConfigCertificado;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificado extends Model
{
    use HasFactory;

    protected $fillable = [
        'config_certificado_id',
        'participante_id',
        'gerado_por_id',
        'alterado_por_id',
        'autenticacao',
        'publicado',
        'created_at',
        'updated_at',
    ];

    public function configCertificado()
    {
        return $this->belongsTo(ConfigCertificado::class);
    }

    public function participante()
    {
        return $this->belongsTo(Participante::class);
    }

    public function geradoPor()
    {
        return $this->belongsTo(User::class, 'gerado_por_id');
    }

    public function alteradoPor()
    {
        return $this->belongsTo(User::class, 'alterado_por_id');
    }

    public function textoParaImpressao()
    {
        $texto = $this->configCertificado->texto;
        $texto = str_replace("[participante.nome]", $this->participante->nome, $texto);
        $texto = str_replace("[participante.cpf]", $this->participante->cpf, $texto);
        $texto = str_replace("[evento.nome]", $this->configCertificado->evento->nome, $texto);
        $texto = str_replace("[evento.inicio]", $this->configCertificado->evento->data_inicio->format('d/m/y'), $texto);
        $texto = str_replace("[evento.fim]", $this->configCertificado->evento->data_fim->format('d/m/y'), $texto);
        $texto = str_replace("[evento.carga_horaria]", $this->configCertificado->evento->carga_horaria, $texto);
        $texto = str_replace("[evento.local]", $this->configCertificado->evento->local, $texto);
        if ($this->configCertificado->atividade) {
            $texto = str_replace("[atividade.nome]", $this->configCertificado->atividade->nome, $texto);
            $texto = str_replace("[atividade.inicio]", $this->configCertificado->atividade->data_inicio->format('d/m/y'), $texto);
            $texto = str_replace("[atividade.fim]", $this->configCertificado->atividade->data_fim->format('d/m/y'), $texto);
            $texto = str_replace("[atividade.carga_horaria]", $this->configCertificado->atividade->carga_horaria, $texto);
        }
        return $texto;
    }
}
