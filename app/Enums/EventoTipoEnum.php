<?php

namespace App\Enums;

enum EventoTipoEnum: string
{
    case ATIVIDADE = "Atividade";
    case EVENTO = "Evento";
    case PROJETO = "Projeto";

    public function getIconClass(): string
    {
        return match ($this) {
            static::ATIVIDADE => "bi bi-clock",
            static::EVENTO => "bi bi-calendar2-event",
            static::PROJETO => "bi bi-kanban",
        };
    }

    public function getDescricao(): string
    {
        return match ($this) {
            static::ATIVIDADE => "Ação composta por uma única atividade.",
            static::EVENTO => "Ação composta por várias atividades.",
            static::PROJETO => "Projetos diversos.",
        };
    }
}
