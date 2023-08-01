<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create(['nome' => 'Avaliador']);
        Perfil::create(['nome' => 'Organizador']);
        Perfil::create(['nome' => 'Autor']);
        Perfil::create(['nome' => 'Ouvinte']);
    }
}
