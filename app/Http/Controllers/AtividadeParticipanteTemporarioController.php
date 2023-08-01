<?php

namespace App\Http\Controllers;

use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\AtividadeParticipanteImport;
use App\Models\AtividadeParticipanteTemporario;
use App\Http\Requests\StoreAtividadeParticipanteTemporarioRequest;
use App\Http\Requests\UpdateAtividadeParticipanteTemporarioRequest;

class AtividadeParticipanteTemporarioController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAtividadeParticipanteTemporarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtividadeParticipanteTemporarioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AtividadeParticipanteTemporario  $atividadeParticipanteTemporario
     * @return \Illuminate\Http\Response
     */
    public function show(AtividadeParticipanteTemporario $atividadeParticipanteTemporario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AtividadeParticipanteTemporario  $atividadeParticipanteTemporario
     * @return \Illuminate\Http\Response
     */
    public function edit(AtividadeParticipanteTemporario $atividadeParticipanteTemporario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtividadeParticipanteTemporarioRequest  $request
     * @param  \App\Models\AtividadeParticipanteTemporario  $atividadeParticipanteTemporario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtividadeParticipanteTemporarioRequest $request, AtividadeParticipanteTemporario $atividadeParticipanteTemporario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AtividadeParticipanteTemporario  $atividadeParticipanteTemporario
     * @return \Illuminate\Http\Response
     */
    public function destroy(AtividadeParticipanteTemporario $atividadeParticipanteTemporario)
    {
        //
    }

    public function import() 
    {
        $file = request()->file('file');
        $path = $file->store('temporario');
        Excel::import(new AtividadeParticipanteImport, $path);
        Storage::delete($path);
        return redirect('/')->with('success', 'Importação concluída.');
    }

}
