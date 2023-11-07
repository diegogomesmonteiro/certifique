<div class="tab-pane fade {{ $ativo == 'certificados' ? 'show active' : '' }}" id="certificados" role="tabpanel"
    aria-labelledby="certificados" tabindex="0">
    {{-- <div class="row justify-content-end mb-4">
        <div class="col-2">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_importar_participantes">Importar</button>
        </div>
        <div class="col-2">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#modal_cadastrar_participante">Adicionar</button>
        </div>
    </div> --}}
    <div>
        <x-eventos.accordion-config-certificados :configCertificados="$evento->configCertificados" />
    </div>
</div>