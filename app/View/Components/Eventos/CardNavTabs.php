<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class CardNavTabs extends Component
{
    public $atividades;

    public function __construct($atividades)
    {
        $this->atividades = $atividades;
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
