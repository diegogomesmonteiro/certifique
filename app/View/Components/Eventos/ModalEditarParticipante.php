<?php

namespace App\View\Components\Eventos;

use App\Models\Participante;
use Illuminate\View\Component;

class ModalEditarParticipante extends Component
{
    

    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.modal-editar-participante');
    }
}
