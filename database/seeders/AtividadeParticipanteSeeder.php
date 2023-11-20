<?php

namespace Database\Seeders;

use App\Models\AtividadeParticipante;
use Illuminate\Database\Seeder;

class AtividadeParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AtividadeParticipante::factory()->count(1000)->create();
    }
}
