<?php

namespace Database\Factories;

use App\Enums\EventoTipoEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dataInicio = $this->faker->dateTimeBetween('-1 year', '-10 day');
        $dataFim = $this->faker->dateTimeBetween($dataInicio, 'now');
        return [
            'nome' => "Formação - " . $this->faker->company,
            'descricao' => $this->faker->text,
            'tipo' => $this->faker->randomElement(EventoTipoEnum::cases()),
            'data_inicio' => $dataInicio,
            'data_fim' => $dataFim,
            'carga_horaria' => $this->faker->numberBetween(1, 40),
            'local' => $this->faker->city.'/'.$this->faker->stateAbbr,
        ];
    }
}
