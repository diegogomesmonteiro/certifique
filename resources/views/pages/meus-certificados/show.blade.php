<x-base-layout>
    @section('titulo', $evento->nome)
    <x-eventos.card-dados-evento :evento="$evento" />
    <div class="row mt-4">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $ativo == 'informacoes' ? 'active' : '' }}" id="informacoes-tab"
                            data-bs-toggle="tab" data-bs-target="#informacoes" type="button" role="tab"
                            aria-controls="informacoes" aria-selected="true">Informações Gerais</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $ativo == 'atividades' ? 'active' : '' }}" id="atividades-tab"
                            data-bs-toggle="tab" data-bs-target="#atividades" type="button" role="tab"
                            aria-controls="atividades" aria-selected="false">Atividades</button>
                    </li>
                    @if ($certificados->isNotEmpty())
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $ativo == 'certificados' ? 'active' : '' }}"
                                id="certificados-tab" data-bs-toggle="tab" data-bs-target="#certificados" type="button"
                                role="tab" aria-controls="certificados" aria-selected="false">Certificados</button>
                        </li>
                    @endif
                </ul>

                {{-- Início Tab Informações --}}
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade {{ $ativo == 'informacoes' ? 'show active' : '' }}" id="informacoes"
                        role="tabpanel" aria-labelledby="informacoes" tabindex="0">
                        <div class="row">
                            <div class="mt-4">
                                <p><span class="fw-bold">Nome:</span> {{ $evento->nome }}</p>
                                <p><span class="fw-bold">Descrição:</span> {{ $evento->descricao }}</p>
                                <p><span class="fw-bold">Tipo:</span> {{ $evento->tipo->value }}</p>
                                <p><span class="fw-bold">Início:</span> {{ $evento->data_inicio->format('d/m/Y') }}</p>
                                <p><span class="fw-bold">Fim:</span> {{ $evento->data_fim->format('d/m/Y') }}</p>
                                <p><span class="fw-bold">Carga Horária Total:</span> {{ $evento->carga_horaria }}h</p>
                                <p><span class="fw-bold">Local:</span> {{ $evento->local }}</p>
                            </div>
                        </div>
                    </div>
                    {{-- Fim Tab Informações --}}

                    {{-- Início Tab Atividades --}}
                    <div class="tab-pane fade {{ $ativo == 'atividades' ? 'show active' : '' }}" id="atividades"
                        role="tabpanel" aria-labelledby="atividades" tabindex="0">
                        <div class="row">
                            @if ($atividades->isEmpty())
                                <div class="mt-4">
                                    <p>Nenhuma atividade cadastrada.</p>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle text-center">
                                        <thead>
                                            <tr class="fw-bold">
                                                <th>Nome</th>
                                                <th>Tipo</th>
                                                <th>Carga Horária</th>
                                                <th>Início</th>
                                                <th>Fim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($atividades as $atividade)
                                                <tr>
                                                    <td>{{ $atividade->nome }}</td>
                                                    <td>{{ $atividade->atividadeTipo->nome }}</td>
                                                    <td>{{ $atividade->carga_horaria }}h</td>
                                                    <td>{{ $atividade->data_inicio->format('d/m/Y') }}</td>
                                                    <td>{{ $atividade->data_fim->format('d/m/Y') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- Fim Tab Atividades --}}

                    @if ($certificados->isNotEmpty())
                        {{-- Início Tab Certificados --}}
                        <div class="tab-pane fade {{ $ativo == 'certificados' ? 'show active' : '' }}"
                            id="certificados" role="tabpanel" aria-labelledby="certificados" tabindex="0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead>
                                        <tr class="fw-bold">
                                            <th>Nome</th>
                                            <th>Gerado em</th>
                                            <th>Gerado por</th>
                                            <th>Downlad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($certificados as $certificado)
                                            <tr>
                                                <td>{{ $certificado->configCertificado->nome }}</td>
                                                <td>{{ $certificado->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $certificado->geradoPor->first_name }}</td>
                                                <td>
                                                    <a id="download"
                                                        target="_blank"
                                                        href="{{ route('certificados.download', ['certificado' => $certificado]) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bi bi-file-earmark-arrow-down-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                        {{-- Fim Tab Certificados --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
