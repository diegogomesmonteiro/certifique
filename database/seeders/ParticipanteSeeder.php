<?php

namespace Database\Seeders;

use App\Models\Participante;
use Illuminate\Database\Seeder;

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Participante::factory()->count(500)->create();
    }
}
