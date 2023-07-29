<div class="row mt-4">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="atividades-tab" data-bs-toggle="tab" data-bs-target="#atividades" type="button" role="tab" aria-controls="atividades" aria-selected="true">Atividades</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="participantes-tab" data-bs-toggle="tab" data-bs-target="#participantes" type="button" role="tab" aria-controls="participantes" aria-selected="false">Participantes</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="certificados-tab" data-bs-toggle="tab" data-bs-target="#certificados" type="button" role="tab" aria-controls="certificados" aria-selected="false">Certificados</button>
                </li>
              </ul>
            <div class="tab-content" id="myTabContent">
                <x-eventos.tab-atividades :atividades='$atividades'/>
                <x-eventos.tab-participantes />
                <x-eventos.tab-certificados />
            </div>
        </div>
    </div>
</div>