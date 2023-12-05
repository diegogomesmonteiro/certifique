<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case GERENCIAR_USUARIOS = 'gerenciar usuarios';
    case GERENCIAR_EVENTOS = 'gerenciar eventos';
    case VISUALIZAR_TODOS_EVENTOS = 'visualizar todos eventos';
    case VISUALIZAR_EVENTOS_PROPRIOS = 'visualizar eventos proprios';

    public function label(): string
    {
        return match ($this) {
            static::GERENCIAR_USUARIOS=> 'Gerenciar usuários',
            static::GERENCIAR_EVENTOS => 'Gerenciar eventos',
            static::VISUALIZAR_TODOS_EVENTOS => 'Visualizar todos os eventos',
            static::VISUALIZAR_EVENTOS_PROPRIOS => 'Visualizar eventos próprios',
        };
    }
}