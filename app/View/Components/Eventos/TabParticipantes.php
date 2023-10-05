<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class TabParticipantes extends Component
{
    
    public $ativo;
    public $atividades;

    public function __construct($ativo=null, $atividades=null)
    {
        $this->ativo = $ativo;
        $this->atividades = $atividades;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.tab-participantes');
    }
}
