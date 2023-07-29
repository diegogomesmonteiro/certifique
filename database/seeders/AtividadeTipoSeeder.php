<?php

namespace Database\Seeders;

use App\Models\AtividadeTipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AtividadeTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AtividadeTipo::create([
            'nome' => 'Minicurso'
        ]);
        AtividadeTipo::create([
            'nome' => 'Palestra'
        ]);
        AtividadeTipo::create([
            'nome' => 'Mesa redonda'
        ]);
        AtividadeTipo::create([
            'nome' => 'Banca TCC'
        ]);
        AtividadeTipo::create([
            'nome' => 'Exposição de Banners'
        ]);

    }
}
