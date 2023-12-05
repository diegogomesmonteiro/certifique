<!-- Modal -->
<div class="modal fade" id="modal_editar_participante" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Participante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_editar_participante' method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-solid" id="editar_nome_participante" name="nome"
                            placeholder="Nome do participante" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-solid" id="editar_cpf" name="cpf" placeholder="CPF"
                        onkeypress="formatarCpfEdicao()" maxlength="14"
                        required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-solid" id="editar_email" name="email" placeholder="E-mail"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const modalEditarParticipante = document.getElementById('modal_editar_participante')
    modalEditarParticipante.addEventListener('show.bs.modal', event => {

        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        const dados = JSON.parse(recipient)

        const inputNome = document.getElementById('editar_nome_participante')
        const inputCpf = document.getElementById('editar_cpf')
        const inputEmail = document.getElementById('editar_email')

        inputNome.value = dados.nome
        inputCpf.value = dados.cpf
        inputEmail.value = dados.email

        const formEditarParticipante = document.getElementById('form_editar_participante')
        formEditarParticipante.action = `/participantes/${dados.id}`
    })

    function editarData(data) {
        return data.split('/').reverse().join('-');
    }
    function formatarCpfEdicao() {
        var cpf = document.getElementById('editar_cpf').value;
        if (cpf.length == 3 || cpf.length == 7) {
            document.getElementById('editar_cpf').value += '.';
        }
        if (cpf.length == 11) {
            document.getElementById('editar_cpf').value += '-';
        }
    }
</script>
