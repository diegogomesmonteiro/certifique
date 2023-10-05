<?php

namespace App\View\Components\Eventos;

use App\Models\Perfil;
use Illuminate\View\Component;

class ModalCadastrarParticipante extends Component
{
    
    public $evento;
    public $perfils;

    public function __construct($evento)
    {
        $this->evento = $evento;
        $this->perfils = Perfil::all();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.modal-cadastrar-participante');
    }
}
