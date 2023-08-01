<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\AtividadeParticipanteTemporario;

class AtividadeParticipanteImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AtividadeParticipanteTemporario([
            'atividade' => $row['atividade'],
            'participante_nome' => $row['nome_do_participante'],
            'participante_cpf' => $row['cpf'],
            'participante_email' => $row['e_mail'],
            'importacao_concluida' => '0'
        ]);
    }
}
