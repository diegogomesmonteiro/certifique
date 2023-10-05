<?php

namespace App\Imports;

use App\Models\Perfil;
use App\Models\Atividade;
use App\Models\Participante;
use App\Models\AtividadeParticipante;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AtividadeParticipanteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $atividade = Atividade::where('nome', $row['atividade'])->first();
        $participante = Participante::where('cpf', $row['cpf'])->first();
        $perfil = Perfil::where('nome', $row['modo_de_participacao'])->first();
        
        if(!$atividade){
            $menssagem = 'Atividade ' . $row['atividade'] . ' não encontrada!';
            session()->flash('danger', $menssagem);
            return;
        }
        if(!$participante){
            $participante = Participante::create([
                'nome' => $row['nome_do_participante'],
                'email' => $row['e_mail'],
                'cpf' => $row['cpf'],
            ]);
        }
        if(!$perfil){
            $menssagem = 'Modo de participação ' . $row['modo_de_participacao'] . ' não encontrado!';
            session()->flash('danger', $menssagem);
            return;
        }
        $atividadeParticipantePerfil = AtividadeParticipante::where('atividade_id', $atividade->id)
            ->where('participante_id', $participante->id)
            ->where('perfil_id', $perfil->id)
            ->first();
        if($atividadeParticipantePerfil){
            $menssagem = 'Participante ' . $row['nome_do_participante'] . ' já cadastrado na atividade ' . $row['atividade'] . '!';
            session()->flash('danger', $menssagem);
            return;
        }else{
            return new AtividadeParticipante([
                'atividade_id' => $atividade->id,
                'participante_id' => $participante->id,
                'perfil_id' => $perfil->id,
            ]);
        }
    }
}
