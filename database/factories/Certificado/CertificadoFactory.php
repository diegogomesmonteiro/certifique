<?php

namespace Database\Factories\Certificado;

use App\Models\Certificado\Certificado;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificado\Certificado>
 */
class CertificadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'autenticacao' => Str::uuid(),
        ];
    }
}
