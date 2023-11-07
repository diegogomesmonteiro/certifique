<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class AccordionConfigCertificados extends Component
{
    
    public $configCertificados;


    public function __construct($configCertificados)
    {
        $this->configCertificados = $configCertificados;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.accordion-config-certificados');
    }
}
