<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class TabAtividades extends Component
{
    
    public $atividades;
    public $ativo;

    public function __construct($atividades, $ativo=null)
    {
        $this->atividades = $atividades;
        $this->ativo = $ativo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.tab-atividades');
    }
}
