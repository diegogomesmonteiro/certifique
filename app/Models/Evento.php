<?php

namespace App\Models;

use App\Models\Atividade;
use App\Models\Certificado\ConfigCertificado;
use Illuminate\Database\Eloquent\Model;
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
        //return $this->hasManyThrough(AtividadeParticipante::class, Atividade::class)->dd();
        //     $sql = "participantes.id FROM participantes
        //             INNER JOIN atividade_participantes ON participantes.id = atividade_participantes.participante_id
        //             INNER JOIN atividades ON atividades.id = atividade_participantes.atividade_id
        //             WHERE atividades.evento_id = " . $this->id;
        //             $this->hasMany(Participante::class)->dd();
        //   return $this->hasMany(Participante::class, 'id', 'id')
        //         ->whereIn('participantes.id', function ($query) use ($sql) {
        //             $query->select(DB::raw($sql));
        //         })->dd();

        // $dadosParticipantes = DB::select($sql);
        // $participantesID = array_map(function ($dadosParticipante) {
        //     return $dadosParticipante->id;
        // }, $dadosParticipantes);
        // $query = Builder::class('App\Models\Participante');
        // $query->whereIn('id', $participantesID)->orderBy('nome', 'asc');
        // return $this->newHasMany(Participante::whereIn('id', $participantesID)->orderBy('nome', 'asc')->get(), $this, 'participantes.id', 'id');
    }
}
