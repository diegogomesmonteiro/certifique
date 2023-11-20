<div class="row mt-4">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $ativo == 'informacoes' ? 'active' : '' }}" id="informacoes-tab"
                        data-bs-toggle="tab" data-bs-target="#informacoes" type="button" role="tab"
                        aria-controls="informacoes" aria-selected="true">Informações Gerais</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $ativo == 'atividades' ? 'active' : '' }}" id="atividades-tab"
                        data-bs-toggle="tab" data-bs-target="#atividades" type="button" role="tab"
                        aria-controls="atividades" aria-selected="false">Atividades</button>
                </li>
                @if ($atividades->isNotEmpty())
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $ativo == 'participantes' ? 'active' : '' }}" id="participantes-tab"
                            data-bs-toggle="tab" data-bs-target="#participantes" type="button" role="tab"
                            aria-controls="participantes" aria-selected="false">Participantes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $ativo == 'config-certificados' ? 'active' : '' }}"
                            id="config-certificados-tab" data-bs-toggle="tab" data-bs-target="#config-certificados"
                            type="button" role="tab" aria-controls="config-certificados"
                            aria-selected="false">Configurações de Certificados</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $ativo == 'certificados' ? 'active' : '' }}" id="certificados-tab"
                            data-bs-toggle="tab" data-bs-target="#certificados" type="button" role="tab"
                            aria-controls="certificados" aria-selected="false">Certificados</button>
                    </li>
                @endif
            </ul>

            <div class="tab-content" id="myTabContent">
                <x-eventos.tab-informacoes :ativo="$ativo" :evento="$evento" />
                <x-eventos.tab-atividades :ativo="$ativo" :atividades="$atividades" />
                @if ($atividades->isNotEmpty())
                    <x-eventos.tab-participantes :ativo="$ativo" :atividades="$atividades" />
                    <x-eventos.tab-config-certificados :ativo="$ativo" :evento="$evento" />
                    <x-eventos.tab-certificados :ativo="$ativo" :evento="$evento" />
                @endif
            </div>
        </div>
    </div>
</div>
