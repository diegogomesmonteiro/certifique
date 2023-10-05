<!-- Modal -->
<div class="modal fade" id="modal_cadastrar_participante" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Novo partcipante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('atividade-participantes.store')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <select class="form-select" name="atividade_id" id="atividade_id" required>
                            <option selected disabled>Atividade</option>  
                            @foreach ($evento->atividades as $atividade)
                            <option value={{$atividade->id}}>{{$atividade->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nome" name="nome" 
                            placeholder="Nome"  required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="cpf" name="cpf" 
                            placeholder="CPF"  required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" 
                            placeholder="E-mail"  required>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" multiple name="perfil_id[]" id="perfil_id" required>
                            <option selected disabled>Modo de participação</option>  
                            @foreach ($perfils as $perfil)
                            <option value="{{$perfil->id}}">{{$perfil->nome}}</option>  
                            @endforeach
                        </select>
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