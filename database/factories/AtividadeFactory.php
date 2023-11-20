<?php

namespace Database\Factories;

use App\Models\AtividadeTipo;
use App\Models\Evento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atividade>
 */
class AtividadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $evento = Evento::all()->random();
        $atividadeTipo = AtividadeTipo::all()->random();
        $dataInicio = $this->faker->dateTimeBetween($evento->data_inicio, $evento->data_fim);
        $dataFim = $this->faker->dateTimeBetween($dataInicio, $evento->data_fim);

        return [
            'nome' => $this->faker->sentence(3),
            'atividade_tipo_id' => $atividadeTipo,
            'carga_horaria' => $this->faker->numberBetween(1, 8),
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'evento_id' => $evento->id,
        ];
    }
}
