<!-- Modal -->
<div class="modal fade" id="modal_editar_atividade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Atividade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_editar_atividade' method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-solid" id="editar_nome" name="nome" 
                            placeholder="Nome da atividade"  required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select form-select-solid" name="atividade_tipo_id" id="editar_atividade_tipo_id" required>
                            <option selected disabled>Selecione o tipo</option>  
                            @foreach ($atividadeTipos as $tipo)
                            <option value={{ $tipo->id }}>{{ $tipo->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="number" step="1"  min="0" class="form-control form-control-solid"
                            id="editar_carga_horaria" name="carga_horaria" 
                            placeholder="Carga horária em horas" required>
                    </div>
                    <div class="row justify-content-around text-center">
                        <div class="mb-3 col-4">
                            <label class="form-label" for="data_inicio">Início</label>
                            <input type="date" class="form-control form-control-solid"
                                id="editar_data_inicio" name="data_inicio" 
                                min="{{$evento->data_inicio->format('Y-m-d')}}"
                                max="{{$evento->data_fim->format('Y-m-d')}}" required/>
                        </div>
                        <div class="mb-3 col-4">
                            <label class="form-label" for="data_fim">Término</label>
                            <input type="date" class="form-control form-control-solid"
                                id="editar_data_fim" name="data_fim" 
                                min="{{$evento->data_inicio->format('Y-m-d')}}"
                                max="{{$evento->data_fim->format('Y-m-d')}}" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit"  class="btn btn-sm btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const modalEditarAtividade = document.getElementById('modal_editar_atividade')
    modalEditarAtividade.addEventListener('show.bs.modal', event => {

        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        const dados = JSON.parse(recipient)
        
        const inputNome = document.getElementById('editar_nome')
        const inputTipo = document.getElementById('editar_atividade_tipo_id')
        const inputCargaHoraria = document.getElementById('editar_carga_horaria')
        const inputDataInicio = document.getElementById('editar_data_inicio')
        const inputDataFim = document.getElementById('editar_data_fim')

        inputNome.value = dados.nome
        inputTipo.value = dados.atividade_tipo_id
        inputCargaHoraria.value = dados.carga_horaria
        inputDataInicio.value = editarData(dados.data_inicio)
        inputDataFim.value = editarData(dados.data_fim)
        
        const formEditarAtividade = document.getElementById('form_editar_atividade')
        formEditarAtividade.action = `/atividades/${dados.id}`
    })
    function editarData(data){
        return data.split('/').reverse().join('-');
    }
</script>