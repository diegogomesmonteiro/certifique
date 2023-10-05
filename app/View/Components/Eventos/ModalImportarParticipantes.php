<?php

namespace App\View\Components\Eventos;

use Illuminate\View\Component;

class ModalImportarParticipantes extends Component
{
    
    public $evento;

    public function __construct($evento)
    {
        $this->evento = $evento;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.modal-importar-participantes');
    }
}
