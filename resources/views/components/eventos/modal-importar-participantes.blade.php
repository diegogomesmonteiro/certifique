<!-- Modal -->
<div class="modal fade" id="modal_importar_participantes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Importar participantes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <a href="{{asset('modelo-participantes.xlsx')}}">
                    <p class="text-center">Um modelo do arquivo ".xlsx" pode ser baixado clicando aqui.</p>
                </a>
            </div>
            <form action="{{route('atividade-participantes.import')}}" method="POST" enctype="multipart/form-data">
                <input type="text" name="evento_id_import" id="evento_id_import" hidden value="{{$evento->id}}">
                <div class="modal-body">
                    @csrf
                    <input type="file" class="btn-check" name="file" required  id="btn-participantes-import"/>
                    <label class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center mb-5" for="btn-participantes-import">
                        <i class="ki-duotone ki-setting-2 fs me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                            </svg>
                        </i>
                        <span class="d-block fw-semibold text-center">
                            <span class="text-dark fw-bold d-block fs-3">Selecione um arquivo para carregamento</span>
                            <span class="text-muted fw-semibold fs-6">
                                Dessa forma você poderá carregar um arquivo com extensão .xlsx, .xls ou .csv com os dados de vários participantes.
                            </span>
                        </span>
                    </label>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</a>
                    <button type="submit"  class="btn btn-sm btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>