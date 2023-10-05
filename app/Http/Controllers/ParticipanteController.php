<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Atividade $atividade)
    {
        return view('pages.participantes.create', ['atividade'=>$atividade]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $participante = Participante::find($id);
        if (!$participante) {
            session()->flash('danger', 'Participante não encontrado!');
            return redirect()->back();
        }
        $atualizado = $participante->update([
            'cpf' => $request->cpf,
            'nome' => $request->nome,
            'email' => $request->email,
        ]);
        if (!$atualizado) {
            session()->flash('danger', 'Erro ao atualizar dados do participante!');
        }else{
            session()->flash('success', 'Dado(s) do participante atualizado(s) com sucesso!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
