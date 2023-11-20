<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\Atividade;
use App\Models\Participante;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\AtividadeParticipante;
use Illuminate\Support\Facades\Storage;
use App\Imports\AtividadeParticipanteImport;
use App\Http\Requests\StoreAtividadeParticipantesRequest;
use App\Http\Requests\StoreAtividadeParticipanteImportRequest;

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
        $qtdeCertificados = 0;
        $configCertificadosDaAtividade = $atividade->configCertificados;
        if ($configCertificadosDaAtividade->isNotEmpty()) {
            foreach ($configCertificadosDaAtividade as $configCertificado) {
                $qtdeCertificados += $participante->certificados()
                    ->where('config_certificado_id', $configCertificado->id)
                    ->count();
            }
            if ($qtdeCertificados > 0) {
                session()->flash('danger', 'Participante possui certificado(s) gerado(s) para esta atividade!');
                return redirect()->back();
            }
        } 
        $configCertificadosGeral = $atividade->evento->configCertificados()
        ->where('atividade_id', null)
                ->get();
        if($configCertificadosGeral->isNotEmpty()) {
            foreach ($configCertificadosGeral as $configCertificadoGeral) {
                $qtdeCertificados += $participante->certificados()
                    ->where('config_certificado_id', $configCertificadoGeral->id)
                    ->count();
            }
            if ($qtdeCertificados > 0) {
                session()->flash('danger', 'Participante possui certificado(s) e tem que está cadastrado em pelo menos uma atividade!');
                return redirect()->back();
            }
        }
        foreach ($atividadesParticipante as $atividadeParticipante) {
            $atividadeParticipante->delete();
        }
        if ($participante->atividades->count() == 0) {
            $participante->delete();
        }
        session()->flash('success', 'Participante removido da atividade com sucesso!');
        return redirect()->back();
    }

    public function import(StoreAtividadeParticipanteImportRequest $request)
    {
        $file = $request->file('file');
        $path = $file->store('temporario/importacao');
        Excel::import(new AtividadeParticipanteImport, $path);
        Storage::delete($path);
        return redirect()->back()->with('success', 'Importação concluída.');
    }
}
