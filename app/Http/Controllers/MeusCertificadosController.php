<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use App\Models\AtividadeTipo;

class MeusCertificadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dadosParticipante = auth()->user()->participante;
        if(!$dadosParticipante){
            session()->flash('danger', 'Você não está cadastrado como participante em nenhum evento!');
            return redirect('/');
        }
        $eventos = $dadosParticipante->getEventos();
        if($eventos->count() == 0){
            session()->flash('danger', 'Você não está cadastrado como participante em nenhum evento!');
            return redirect()->back();
        }
        return view('pages.meus-certificados.index', ['eventos' => $eventos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(Evento $evento, String $abaAtiva = 'informacoes')
    {
        $participante = auth()->user()->participante;
        $certificados = $participante->getCertificadosDeEvento($evento);
        return view('pages.meus-certificados.show', [
            'evento' => $evento,
            'atividades' => $participante->getAtividadesDeEvento($evento),
            'ativo' => $abaAtiva,
            'certificados' => $certificados,
        ]);
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
        //
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
