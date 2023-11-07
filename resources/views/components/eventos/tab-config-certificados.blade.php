<div class="tab-pane fade {{ $ativo == 'config-certificados' ? 'show active' : '' }}" id="config-certificados"
    role="tabpanel" aria-labelledby="config-certificados" tabindex="0">
    <div class="row justify-content-end mb-4">
        <div class="col-2">
            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Adicionar
            </button>
            <ul class="dropdown-menu">
                @foreach (TipoConfigCertificadoEnum::cases() as $tipoConfigCertificado)
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('config-certificados.create', [
                                'evento' => $evento,
                                'tipoConfigCertificado' => $tipoConfigCertificado->value,
                            ]) }}">{{ $tipoConfigCertificado->value }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        @if ($evento->configCertificados->isEmpty())
            <div class="mt-4">
                <p>Nenhuma configuração de certificado cadastrada.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead>
                        <tr class="fw-bold">
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Atividade</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($evento->configCertificados as $configCertificado)
                            <tr>
                                <td>{{ $configCertificado->nome }}</td>
                                <td>{{ $configCertificado->tipo->value }}</td>
                                <td>{{ $configCertificado->atividade->nome ?? 'Não possui' }}</td>
                                <td class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('config-certificados.edit', $configCertificado) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="bi bi-pencil-square" alt="Editar"></i>
                                    </a>
                                    @php
                                        $dados['participantes'] = $configCertificado->participantesDisponiveisParaCertificacao();
                                        $dados['configCertificadoId'] = $configCertificado->id;
                                    @endphp
                                    @if ($dados['participantes']->count())
                                        <a id="publicar" href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal_publicar_certificado"
                                            data-bs-whatever="{{ json_encode($dados) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-send-fill" alt="Publicar"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('config-certificados.destroy', [$configCertificado]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash3-fill danger" alt="Excluir"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
