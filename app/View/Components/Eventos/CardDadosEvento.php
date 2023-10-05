<?php

namespace App\View\Components\Eventos;

use App\Models\Evento;
use Illuminate\View\Component;

class CardDadosEvento extends Component
{
    public Evento $evento;

    public function __construct(Evento $evento)
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
        return view('components.eventos.card-dados-evento');
    }
}
