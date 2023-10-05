<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class TabConfigCertificados extends Component
{
    
    public $ativo; 

    public function __construct($ativo=null)
    {
        $this->ativo = $ativo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.tab-config-certificados');
    }
}
