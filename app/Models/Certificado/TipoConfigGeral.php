<?php

namespace App\Models\Certificado;

class TipoConfigGeral extends ConfigCertificado
{
    public function __construct()
    {
        $this->atividade_id = null;
        $this->tipo_certificado = 'Geral';
    }

}