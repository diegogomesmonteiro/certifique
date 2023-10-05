<div class="tab-pane fade {{ $ativo == 'atividades' ? 'show active' : '' }}" id="atividades" role="tabpanel"
    aria-labelledby="atividades" tabindex="0">
    <div class="row justify-content-end mb-4">
        <div class="col-2">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_cadastrar_atividade">
                Adicionar
            </button>
        </div>
    </div>
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
                            <th>Participantes</th>
                            <th>Ação</th>
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
                                <td>
                                    @if ($atividade->participantes()->count() > 0)
                                        <span class="badge badge-light-info">{{ $atividade->participantes()->count() }}
                                            participante(s)</span>
                                    @else
                                        <button class="badge badge-light-info" data-bs-toggle="modal"
                                            data-bs-target="#modal_importar_participantes"><i
                                                class="bi bi-database-fill-up"></i></button>
                                        <button class="badge badge-light-info" data-bs-toggle="modal"
                                            data-bs-target="#modal_cadastrar_participante"><i
                                                class="bi bi-person-fill-add"></i></button>
                                    @endif
                                </td>
                                <td class="d-flex gap-2">
                                    <a id="editar" href="" data-bs-toggle="modal"
                                        data-bs-target="#modal_editar_atividade" data-bs-whatever="{{ $atividade }}"
                                        class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ route('atividades.destroy', [$atividade]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="bi bi-trash3-fill danger"></i></button>
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
