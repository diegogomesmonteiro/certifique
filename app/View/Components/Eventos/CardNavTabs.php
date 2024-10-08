<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class CardNavTabs extends Component
{
    public $evento;
    public $atividades;
    public $ativo;

    public function __construct($evento, String $ativo=null)
    {
        $this->evento = $evento;
        $this->atividades = $evento->atividades;
        $this->ativo = $ativo;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.card-nav-tabs');
    }
}
