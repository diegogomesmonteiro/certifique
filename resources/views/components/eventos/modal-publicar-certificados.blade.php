<!-- Modal -->
<div class="modal fade" id="modal_publicar_certificado" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Selecione os participantes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id='form_publicar_certificado' action="{{ route('certificados.publicar') }}" method="POST">
                @csrf
                <input type="hidden" name="config_certificado_id" id="config_certificado_id" value="" required>
                <div class="modal-body">
                    <div class="mb-3" class="form-select form-select-solid" id="listaCheckbox">
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
    const modalPublicarCertificado = document.getElementById('modal_publicar_certificado')
    modalPublicarCertificado.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute('data-bs-whatever')
        const dados = JSON.parse(recipient)
        const configCertificadoId = dados.configCertificadoId
        const participantes = dados.participantes
        const participantesArray = Object.values(participantes)
        participantesArray.sort((a, b) => a.nome.localeCompare(b.nome))
        atualizarListCheckbox(participantesArray)
        atualizarInputHidden(configCertificadoId)
    })

    function atualizarListCheckbox(participantesArray) {
        const listaCheckbox = document.getElementById('listaCheckbox')
        listaCheckbox.innerHTML = ''
        participantesArray.forEach(participante => {
            const div = document.createElement('div')
            div.className = 'form-check form-check-inline'
            const input = document.createElement('input')
            input.className = 'form-check-input'
            input.type = 'checkbox'
            input.name = 'participantes[]'
            input.value = participante.id
            input.id = 'certificado-participante-' + participante.id
            input.checked = true
            const label = document.createElement('label')
            label.className = 'form-check-label'
            label.htmlFor = 'certificado-participante-' + participante.id
            label.innerHTML = participante.nome
            div.appendChild(input)
            div.appendChild(label)
            listaCheckbox.appendChild(div)
        })
    }

    function atualizarInputHidden(configCertificadoId) {
        const input = document.getElementById('config_certificado_id')
        input.value = configCertificadoId
    }
</script>