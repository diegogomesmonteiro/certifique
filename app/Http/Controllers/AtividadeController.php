<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Http\Requests\StoreAtividadeRequest;
use App\Http\Requests\UpdateAtividadeRequest;
use App\Models\Evento;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Evento $evento)
    {
        $atividades = $evento->atividades();
        return view('atividades.index', ['atividades'=>$atividades, 'evento'=>$evento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Evento $evento)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAtividadeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtividadeRequest $request, Evento $evento)
    {
        $atividade = new Atividade($request->validated());
        $atividade->evento()->associate($evento);

        if ($atividade->save()) {
            session()->flash('success', 'Cadastro realizado com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao realizar cadastro!');
        }
        return redirect()->route('eventos.show', $evento->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show(Atividade $atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit(Atividade $atividade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtividadeRequest  $request
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtividadeRequest $request, Atividade $atividade)
    {
        $atividade->fill($request->validated());
        if($atividade->update()){
            session()->flash('success', 'Atividade atualizada com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao atualizar atividade!');
        }
        return redirect()->route('eventos.show', $atividade->evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atividade $atividade)
    {
        if($atividade->participantes()->count() > 0){
            session()->flash('danger', 'Não é possível excluir atividade com participantes vinculados!');
            return redirect()->back();
        }
        if($atividade->configCertificados()->count() > 0){
            session()->flash('danger', 'Não é possível excluir atividade vinculada a uma configuração de certificado!');
            return redirect()->back();
        }
        if ($atividade->delete()) {
            session()->flash('success', 'Atividade excluída com sucesso!');
        } else {
            session()->flash('danger', 'Erro ao excluir atividade!');
        }
        return redirect()->back();
    }
}
