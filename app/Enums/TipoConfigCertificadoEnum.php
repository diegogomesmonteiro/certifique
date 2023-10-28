<?php

namespace App\Enums;

enum TipoConfigCertificadoEnum: string
{
    case GERAL = "Geral";
    case ATIVIDADE = "Atividade";
    case PARTICIPANTE = "Participante";

    public static function getValues(): array
    {
        return [
            self::GERAL->value,
            self::ATIVIDADE->value,
            self::PARTICIPANTE->value,
        ];
    }

    public function getTags(): array
    {
        switch ($this->value) {
            case self::GERAL->value:
                return [
                    "[participante.nome]",
                    "[evento.nome]",
                    "[evento.inicio]",
                    "[evento.fim]",
                    "[evento.carga_horaria]",
                ];
                break;
            case self::ATIVIDADE->value:
                return [
                    "[participante.nome]",
                    "[atividade.nome]",
                    "[atividade.inicio]",
                    "[ativcidade.fim]",
                    "[atividade.carga_horaria]",
                ];
                break;
            default:
                return session()->flash('error', 'Tipo de configuração de certificado inválida');
                break;
        }
    }
}
