<?php

namespace App\Enums;

enum TipoConfigCertificadoEnum: string
{
    case ATIVIDADE = "Atividade";
    case GERAL = "Geral";

    public function getColor(): string
    {
        return match ($this) {
            static::ATIVIDADE => "secondary",
            static::GERAL => "primary",
        };
    }

    public function getTags(): array
    {
        return match ($this) {
            static::ATIVIDADE => [
                "[participante.nome]",
                "[participante.cpf]",
                "[atividade.nome]",
                "[atividade.inicio]",
                "[atividade.fim]",
                "[atividade.carga_horaria]",
                "[evento.nome]",
                "[evento.local]",
            ],
            static::GERAL => [
                "[participante.nome]",
                "[participante.cpf]",
                "[evento.nome]",
                "[evento.inicio]",
                "[evento.fim]",
                "[evento.carga_horaria]",
                "[evento.local]",
            ],
        };
    }
}
