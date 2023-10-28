<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Enums\TipoConfigCertificadoEnum;
use App\Models\Certificado\ConfigCertificado;
use App\Http\Requests\StoreConfigCertificadoRequest;

class ConfigCertificadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conifg = ConfigCertificado::all();
        dd("Teste");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Evento $evento, TipoConfigCertificadoEnum $tipoConfigCertificado)
    {
        return view('pages.eventos.config-certificados.create', [
            'evento' => $evento,
            'tipoConfigCertificado' => $tipoConfigCertificado,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConfigCertificadoRequest $request, Evento $evento)
    {
        $dadosValidados = $request->validated();
        if ($request->hasFile('arquivo_layout')) {
            $layout = $request->file('arquivo_layout');
            $layout->storePubliclyAs('public/img/layout-certificados/' . $evento->id, $layout->getClientOriginalName());
            $dadosValidados['layout'] = $layout->getClientOriginalName();
        }
        $configCertificado = ConfigCertificado::create($dadosValidados);
        if (!$configCertificado) {
            return redirect()->back()->with('danger', 'Erro ao criar configuração de certificado!');
        }
        return redirect()->route('eventos.show', [
            'evento' => $evento,
            'abaAtiva' => 'config-certificados',
        ])->with('success', 'Configuração de certificado criada com sucesso!');
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
        $configCertificado = ConfigCertificado::find($id);
        if (!$configCertificado) {
            return redirect()->back()->with('danger', 'Configuração de certificado não encontrada!');
        }
        $evento = $configCertificado->evento;
        $layouts = ConfigCertificado::where('layout', $configCertificado->layout)
            ->where('evento_id', $configCertificado->evento_id)
            ->get();
        if($layouts->count() == 1){
            $path = 'public/img/layout-certificados/' . $configCertificado->evento_id . '/' . $configCertificado->layout;
            Storage::delete($path);
        }
        $result = $configCertificado->delete();
        if (!$result) {
            return redirect()->back()->with('danger', 'Erro ao excluir configuração de certificado!');
        }
        return redirect()->route('eventos.show',[
            'evento' => $evento,
            'abaAtiva' => 'config-certificados',
        ])->with('success', 'Configuração de certificado excluída com sucesso!');
    }
}
