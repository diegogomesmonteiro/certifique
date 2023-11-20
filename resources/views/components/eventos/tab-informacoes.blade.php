<div class="tab-pane fade {{ $ativo == 'informacoes' ? 'show active' : '' }}" id="informacoes" role="tabpanel"
    aria-labelledby="informacoes" tabindex="0">
    <div class="row">
        <div class="mt-4">
            <p><span class="fw-bold">Nome:</span> {{ $evento->nome }}</p>
            <p><span class="fw-bold">Descrição:</span> {{ $evento->descricao }}</p>
            <p><span class="fw-bold">Tipo:</span> {{ $evento->tipo->value }}</p>
            <p><span class="fw-bold">Início:</span> {{ $evento->data_inicio->format('d/m/Y') }}</p>
            <p><span class="fw-bold">Fim:</span> {{ $evento->data_fim->format('d/m/Y') }}</p>
            <p><span class="fw-bold">Carga Horária Total:</span> {{ $evento->carga_horaria }}h</p>
            <p><span class="fw-bold">Local:</span> {{ $evento->local }}</p>
        </div>
    </div>
</div>
