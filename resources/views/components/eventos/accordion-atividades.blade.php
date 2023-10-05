@foreach ($atividades as $atividade)
    <div class="row">
        <!--begin::Accordion-->
        <div class="accordion" id="kt_accordion_1">
            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_{{ $atividade->id }}">
                    <button class="accordion-button fs-6 fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_{{ $atividade->id }}" aria-expanded="true"
                        aria-controls="kt_accordion_1_body_{{ $atividade->id }}">
                        {{ $atividade->nome }}
                    </button>
                </h2>
                <div id="kt_accordion_1_body_{{ $atividade->id }}" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_{{ $atividade->id }}" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        @if ($atividade->participantes->isEmpty())
                            <p>Nenhum participante cadastrado</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle text-center">
                                    <thead>
                                        <tr class="fw-bold">
                                            <th>Nome</th>
                                            <th>CPF</th>
                                            <th>E-mail</th>
                                            <th>Modo de Participação</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($atividade->participantes as $participante)
                                        <tr>
                                            <td>{{ $participante->nome }}</td>
                                            <td>{{ $participante->cpf }}</td>
                                            <td>{{ $participante->email }}</td>
                                            <td>
                                                @foreach ($participante->perfilsNaAtividade($atividade) as $perfil)
                                                        <span
                                                            class="badge badge-light-primary">{{ $perfil->nome }}</span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                <td class="d-flex gap-2">
                                                    <a id="editar" href="" data-bs-toggle="modal"
                                                        data-bs-target="#modal_editar_participante"
                                                        data-bs-whatever="{{ $participante }}"
                                                        class="btn btn-sm btn-primary"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <form
                                                        action="{{ route('atividade-participantes.destroy', [$atividade, $participante]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                                class="bi bi-trash3-fill danger"></i></button>
                                                    </form>
                                                </td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Accordion-->
        </div>
    </div>
@endforeach
