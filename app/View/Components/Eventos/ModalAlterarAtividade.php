<?php

namespace App\View\Components\Eventos;

use App\Models\Evento;
use App\Models\Atividade;
use App\Models\AtividadeTipo;
use Illuminate\View\Component;

class ModalAlterarAtividade extends Component
{
    public Evento $evento;
    public $atividadeTipos;

    public function __construct(Evento $evento)
    {
        $this->evento = $evento;
        $this->atividadeTipos = AtividadeTipo::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.eventos.modal-alterar-atividade');
    }
}
