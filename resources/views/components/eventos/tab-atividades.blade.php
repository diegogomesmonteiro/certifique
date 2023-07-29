<div class="tab-pane fade show active" id="atividades" role="tabpanel" aria-labelledby="atividades" tabindex="0">
    <div class="row">
        @if($atividades->isEmpty())
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
                        <td>{{$atividade->nome}}</td>
                        <td>{{$atividade->atividadeTipo->nome}}</td>
                        <td>{{$atividade->carga_horaria}}h</td>
                        <td>{{$atividade->data_inicio->format('d/m/Y')}}</td>
                        <td>{{$atividade->data_fim->format('d/m/Y')}}</td>
                        <td>
                            @if ($atividade->participantes()->count() > 0)
                                <a href="{{route('atividades.participantes', [$atividade])}}" class="btn btn-primary">{{$atividade->participantes()->count()}} participantes</a>
                            @else
                                <a href="{{route('atividades.participantes.create', [$atividade])}}" class="badge badge-light-info">Atribuir</a>
                            @endif
                            @php
                                $atividade->participantes()?$atividade->participantes()->get():'Atribuir' 
                            @endphp
                        </td>
                        <td class="d-flex gap-2">
                                <a id="alterar" href="" data-bs-toggle="modal" data-bs-target="#modal_alterar_atividade" data-bs-whatever="{{$atividade}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{route('atividades.destroy', [$atividade])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill danger"></i></button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>

        <div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_cadastrar_atividade">Cadastrar Atividade</button>
        </div>
    </div>
</div>