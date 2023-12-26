<?php

namespace App\Mail;

use App\Models\Certificado\Certificado;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CertificadoNotificacao extends Mailable
{
    use Queueable, SerializesModels;

    private Certificado $certificado;

    public function __construct(Certificado $certificado)
    {
        $this->certificado = $certificado;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $evento = $this->certificado->configCertificado->evento;
        $participante = $this->certificado->participante;
        $identificador = $this->certificado->id;

        $this->subject('Certificado: ' . $evento->nome);
        $this->to($participante->email, $participante->nome);
        $this->from('dgm7@aluno.ifnmg.edu.br','IFNMG Almenara');
        $this->replyTo('suporte@ifnmg.edu.br', 'Suporte IFNMG');
        $this->markdown('email.certificado-notificacao', [
            'identificador' => $identificador,
            'nome' => $participante->nome,
        ]);
        return $this;
    }

}