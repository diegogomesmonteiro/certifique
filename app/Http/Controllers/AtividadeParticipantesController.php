<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Atividade;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Imports\AtividadeParticipanteImport;
use App\Http\Requests\StoreAtividadeParticipantesRequest;
use App\Models\AtividadeParticipante;
use App\Models\Participante;

class AtividadeParticipantesController extends Controller
{

    public function store(StoreAtividadeParticipantesRequest $request)
    {
        $atividade = Atividade::find($request->atividade_id);
        $perfils = $request->perfil_id;
        if (!$atividade) {
            session()->flash('danger', 'Atividade não encontrada!');
            return redirect()->back();
        }
        if (!$perfils) {
            session()->flash('danger', 'Modo de participação não informado!');
            return redirect()->back();
        }
        $participante = Participante::where('cpf', $request->cpf)->first();
        if (!$participante) {
            $participante = Participante::create([
                'cpf' => $request->cpf,
                'nome' => $request->nome,
                'email' => $request->email,
            ]);
        }
        foreach ($perfils as $perfil_id) {
            $perfil = Perfil::find($perfil_id);
            if (!$perfil) {
                session()->flash('danger', 'Modo de participação não encontrado!');
                return redirect()->back();
            }
            $atividadeParticipante = AtividadeParticipante::create([
                'atividade_id' => $atividade->id,
                'participante_id' => $participante->id,
                'perfil_id' => $perfil->id,
            ]);
            if (!$atividadeParticipante) {
                session()->flash('danger', 'Erro ao cadastrar novo participante!');
            } else {
                session()->flash('success', 'Cadastro realizado com sucesso!');
            }
        }
        return redirect()->back();
    }

    public function destroy(Atividade $atividade, Participante $participante)
    {
        $atividadesParticipante = AtividadeParticipante::where('participante_id', $participante->id)
            ->where('atividade_id', $atividade->id)
            ->get();
        if (!$atividadesParticipante) {
            session()->flash('danger', 'Participante não encontrado na atividade!');
            return redirect()->back();
        }
        foreach ($atividadesParticipante as $atividadeParticipante) {
            $atividadeParticipante->delete();
        }
        if($participante->atividades->count() == 0){
            $participante->delete();
        }
        session()->flash('success', 'Participante removido da atividade com sucesso!');
        return redirect()->back();
    }

    public function import()
    {
        $file = request()->file('file');
        $extension = $file->getClientOriginalExtension();
        if($extension != 'csv'){
            session()->flash('danger', 'Extensão do arquivo inválida!');
            return redirect()->back();
        }
        $path = $file->store('temporario');
        Excel::import(new AtividadeParticipanteImport, $path);
        Storage::delete($path);
        return redirect()->back()->with('success', 'Importação concluída.');
    }
}
