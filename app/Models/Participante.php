<?php

namespace App\Models;

use App\Models\Perfil;
use App\Models\Atividade;
use App\Models\Certificado\Certificado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participante extends Model
{

    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
    ];

    protected function cpf(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->formatarCpf($value),
            set: fn ($value) => $this->limparCpf($value),
        );
    }

    private function formatarCpf($value)
    {
        $CPF_LENGTH = 11;
        $cnpj_cpf = preg_replace("/\D/", '', $value);

        if (strlen($cnpj_cpf) === $CPF_LENGTH) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
    }

    private function limparCpf($value)
    {
        $value = trim($value);
        $value = str_replace(".", "", $value);
        $value = str_replace(",", "", $value);
        $value = str_replace("-", "", $value);
        $value = str_replace("/", "", $value);
        return $value;
    }

    public function atividades()
    {
        return $this->belongsToMany(Atividade::class, 'atividade_participantes');
    }

    public function getAtividadesDeEvento(Evento $evento)
    {
        return $this->atividades()
        ->where('evento_id', $evento->id)
        ->orderBy('atividades.nome')
        ->get();
    }

    public function getEventos()
    {
        $eventos = Evento::whereIn('id', function ($query){
            $query->select('atividades.evento_id')
                ->from('atividades')
                ->join('atividade_participantes', 'atividades.id', '=', 'atividade_participantes.atividade_id')
                ->where('atividade_participantes.participante_id', $this->id);
        })->get();
        return $eventos;    
    }

    public function certificados()
    {
        return $this->hasMany(Certificado::class);
    }

    public function getCertificadosDeEvento(Evento $evento)
    {
        $certificados = Certificado::whereIn('id', function ($query) use ($evento){
            $query->select('certificados.id')
                ->from('certificados')
                ->join('config_certificados', 'certificados.config_certificado_id', '=', 'config_certificados.id')
                ->where('config_certificados.evento_id', $evento->id)
                ->where('certificados.participante_id', $this->id)
                ->where('certificados.publicado', true);
        })->get();
        return $certificados;
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
