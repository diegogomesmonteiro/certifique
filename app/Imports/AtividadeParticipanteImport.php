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
            'atividade' => $row['Atividade'],
            'participante_nome' => $row['Nome do Participante'],
            'participante_cpf' => $row['CPF'],
            'participante_email' => $row['E-mail'],
            'importacao_concluida' => '0'
        ]);
    }
}
