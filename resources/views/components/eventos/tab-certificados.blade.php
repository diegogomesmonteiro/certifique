<div class="tab-pane fade {{ $ativo == 'certificados' ? 'show active' : '' }}" id="certificados" role="tabpanel"
    aria-labelledby="certificados" tabindex="0">
    <div>
        <x-eventos.accordion-config-certificados :configCertificados="$evento->configCertificados" />
    </div>
</div>