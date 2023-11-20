<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class TabInformacoes extends Component
{
    
    public $evento;
    public $ativo;


    public function __construct($evento, $ativo=null)
    {
        $this->evento = $evento;
        $this->ativo = $ativo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.tab-informacoes');
    }
}
