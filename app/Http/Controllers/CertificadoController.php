<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Certificado\Certificado;
use App\Models\Certificado\ConfigCertificado;
use App\Http\Requests\StoreCertificadoRequest;
use App\Http\Requests\UpdateCertificadoRequest;
use App\Http\Requests\PublicarCertificadoRequest;
use App\Mail\CertificadoNotificacao;
use Database\Factories\Certificado\CertificadoFactory;
use Illuminate\Support\Facades\Mail;

class CertificadoController extends Controller
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
     * @param  \App\Http\Requests\StoreCertificadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificadoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificado\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificado\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificadoRequest  $request
     * @param  \App\Models\Certificado\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificadoRequest $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificado\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificado $certificado)
    {
        $evento = $certificado->configCertificado->evento;
        $rotaDeRetorno = redirect()->route('eventos.show', [
            'evento' => $evento,
            'abaAtiva' => 'certificados',
        ]);
        if ($certificado->publicado) {
            return $rotaDeRetorno->with('danger', 'Não é possível excluir o certificado, pois está publicado!');
        }
        if (!$certificado->delete()) return redirect()->back()->with('danger', 'Erro ao excluir certificado!');
        return $rotaDeRetorno->with('success', 'Certificado excluído com sucesso!');
    }

    public function publicar(PublicarCertificadoRequest $request)
    {
        $participantes = $request->participantes;
        $config_certificado = ConfigCertificado::findOrFail($request->config_certificado_id);
        $evento = $config_certificado->evento;
        $rotaDeRetorno = redirect()->route('eventos.show', [
            'evento' => $evento,
            'abaAtiva' => 'config-certificados',
        ]);
        $data = array_map(function ($participante) use ($config_certificado) {
            return [
                'config_certificado_id' => $config_certificado->id,
                'participante_id' => $participante,
                'gerado_por_id' => Auth::id(),
            ];
        }, $participantes);
        $certificadosCriados = CertificadoFactory::factoryForModel(Certificado::class)->createMany($data);
        if (!$certificadosCriados) return $rotaDeRetorno->with('danger', 'Erro ao publicar certificado(s)!');
        foreach ($certificadosCriados as $certificado) {
            Mail::queue(new CertificadoNotificacao($certificado));
        }
        return $rotaDeRetorno->with('success', 'Certificado(s) publicado(s) com sucesso! E-mail(s) estão sendo enviado(s) para o(s) participante(s)!');
    }

    public function alterarPublicacao(Request $request)
    {
        $certificado = Certificado::find($request->id);
        if (!$certificado) {
            $resposta['success'] = false;
            $resposta['message'] = 'Certificado não encontrado!';
            return json_encode($resposta);
        }
        $certificado->publicado = !$certificado->publicado;
        if (!$certificado->update()) {
            $resposta['success'] = false;
            $resposta['message'] = 'Erro ao alterar publicação do certificado!';
        } else {
            $resposta['success'] = true;
            $resposta['message'] = 'Publicação do certificado alterada com sucesso!';
        }
        return json_encode($resposta);
    }


    public function download(Certificado $certificado)
    {
        $configCertificado = $certificado->configCertificado;
        $texto = $certificado->textoParaImpressao();
        $pdf = \PDF::loadView('pages.eventos.certificados.template-download',[
            'imagem' => $configCertificado->getPathLayout(),
            'texto' => $texto,
            'autenticacao' => $certificado->autenticacao,
        ])
        ->setPaper('a4', 'landscape');
        return $pdf->stream('certificado.pdf');
    }
}
