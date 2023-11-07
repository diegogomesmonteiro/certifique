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
}
