<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\AtividadeTipo;

use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::orderByDesc('data_inicio')->get();
        return view('pages.eventos.index', ['eventos' => $eventos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventoRequest $request)
    {
        $evento = Evento::create($request->validated());
        if ($evento) {
            session()->flash('success', 'Cadastro realizado com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao realizar cadastro!');
        }
        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento, String $abaAtiva = 'informacoes')
    {
        $atividadeTipos = AtividadeTipo::orderBy('nome')->get();
        return view('pages.eventos.show', [
            'evento' => $evento,
            'atividadeTipos' => $atividadeTipos,
            'abaAtiva' => $abaAtiva,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('pages.eventos.create', ['evento' => $evento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventoRequest  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        if ($evento->update($request->validated())) {
            session()->flash('success', 'Evento atualizado com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao atualizar evento!');
        }
        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        if($evento->atividades()->count() > 0) {
            session()->flash('danger', 'Não é possível excluir um evento que possui atividades!');
            return redirect()->back();
        }
        if ($evento->delete()) {
            session()->flash('success', 'Evento excluído com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao excluir evento!');
        }
        return redirect()->back();
    }
}