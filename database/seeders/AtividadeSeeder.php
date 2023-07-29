<?php

namespace Database\Seeders;

use App\Models\Atividade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtividadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Atividade::create([
            'evento_id' => '3',
            'nome' => 'Introdução ao Laravel',
            'atividade_tipo_id' => '1',
            'carga_horaria' => '4',
            'data_inicio' => '2023-07-03',
            'data_fim' => '2023-07-03',
        ]);
        Atividade::create([
            'evento_id' => '3',
            'nome' => 'Curso Bubble',
            'atividade_tipo_id' => '1',
            'carga_horaria' => '3',
            'data_inicio' => '2023-07-04',
            'data_fim' => '2023-07-04',
        ]);
        Atividade::create([
            'evento_id' => '3',
            'nome' => 'Curso Javascript',
            'atividade_tipo_id' => '1',
            'carga_horaria' => '3',
            'data_inicio' => '2023-07-05',
            'data_fim' => '2023-07-05',
        ]);
    }
}
