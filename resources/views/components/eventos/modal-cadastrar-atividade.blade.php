<!-- Modal -->
<div class="modal fade" id="modal_cadastrar_atividade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Nova atividade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('atividades.store', $evento)}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nome" name="nome" 
                            placeholder="Nome da atividade"  required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="atividade_tipo_id" id="atividade_tipo_id" required>
                            <option selected disabled>Selecione o tipo</option>  
                            @foreach ($atividadeTipos as $tipo)
                            <option value={{ $tipo->id }}>{{ $tipo->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" step="1"  min="0" class="form-control"
                            id="carga_horaria" name="carga_horaria" 
                            placeholder="Carga horária em horas" required>
                    </div>
                    <div class="row justify-content-around text-center">
                        <div class="mb-3 col-4">
                            <label class="form-label" for="data_inicio">Início</label>
                            <input type="date" class="form-control"
                                id="data_inicio" name="data_inicio" 
                                min="{{$evento->data_inicio->format('Y-m-d')}}"
                                max="{{$evento->data_fim->format('Y-m-d')}}" required/>
                        </div>
                        <div class="mb-3 col-4">
                            <label class="form-label" for="data_fim">Término</label>
                            <input type="date" class="form-control"
                                id="data_fim" name="data_fim" 
                                min="{{$evento->data_inicio->format('Y-m-d')}}"
                                max="{{$evento->data_fim->format('Y-m-d')}}" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit"  class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>