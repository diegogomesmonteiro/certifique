<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evento::create([
            'tipo' => 'Atividade',
            'nome' => 'Apresentação de TCC',
            'descricao' => 'TCC aluno Diego',
            'data_inicio' => '2023-06-27',
            'data_fim' => '2023-06-27',
            'local' => 'Almenara/MG',
            'carga_horaria' => 4,
        ]);
        Evento::create([
            'tipo' => 'Evento',
            'nome' => 'Semana acadêmica',
            'descricao' => 'Curso de Análise e Desenvolvimento de Sistemas',
            'data_inicio' => '2023-07-03',
            'data_fim' => '2023-07-07',
            'local' => 'Almenara/MG',
            'carga_horaria' => 10,
        ]);
        Evento::create([
            'tipo' => 'Projeto',
            'nome' => 'Iniciação à robótica nas escolas estaduais',
            'descricao' => 'Projeto desenvolvido nas escolas estaduais de Almenara/MG',
            'data_inicio' => '2023-07-03',
            'data_fim' => '2023-07-07',
            'local' => 'Almenara/MG',
            'carga_horaria' => 50,
        ]);
        Evento::factory()->count(2)->create();
    }
}
