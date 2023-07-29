<x-base-layout>
    <div>
        <div class="card text-center">
            <div class="card-header d-block">
                <h4 class="mt-4">Atividade: {{$atividade->nome}}</h4>
                <h6>Evento: {{$atividade->evento->nome}}</h6>
            </div>
            <div class="card-body text-center">
                <div class="row justify-content-around">
                    <div class="col-4">
                        <!--begin::Option-->
                        <div>
                            <h6>Upload de arquivo</h6>
                        </div>
                        <div>
                            <a href="">Um modelo do arquivo ".csv" pode ser baixado clicando aqui.</a>
                        </div>
                        <form action="" method="POST">
                            <input type="file" class="btn-check" name="radio_buttons_2" value="apps" checked="checked"  id="kt_radio_buttons_2_option_1"/>
                            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-5" for="kt_radio_buttons_2_option_1">
                                <i class="ki-duotone ki-setting-2 fs me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                  </svg></i>
                                <span class="d-block fw-semibold text-center">
                                    <span class="text-dark fw-bold d-block fs-3">Selecione um arquivo para carregamento</span>
                                    <span class="text-muted fw-semibold fs-6">
                                        Dessa forma você poderá carregar um arquivo ".csv" com os dados de vários participantes.
                                    </span>
                                </span>
                            </label>
                            <div>
                                <button type='submit' class="btn btn-primary">Avançar</button>
                            </div>
                        </form>
                        <!--end::Option-->
                    </div>
                    <div class="col-4">
                        <h6>Cadastrar individualmente</h6>
                        <a href="" class="btn btn-primary">Chamar modal</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="{{route('eventos.show', [$atividade->evento])}}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</x-base-layout>