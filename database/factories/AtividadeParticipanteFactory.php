<?php

namespace Database\Factories;

use App\Models\Atividade;
use App\Models\Participante;
use App\Models\Perfil;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AtividadeParticipante>
 */
class AtividadeParticipanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $atividade = Atividade::all()->random();
        $participante = Participante::all()->random();
        $perfil = Perfil::all()->random();
        return [
            'atividade_id' => $atividade->id,
            'participante_id' => $participante->id,
            'perfil_id' => $perfil->id,
        ];
    }
}
