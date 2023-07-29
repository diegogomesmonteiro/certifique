<x-base-layout>
    <!--begin::Stepper-->
    <div class="stepper stepper-pills stepper-column d-flex flex-column  flex-lg-row" id="kt_stepper_example_vertical">
        <!--begin::Aside-->
        <div class="d-flex flex-row-auto mb-4 me-4 w-100 w-lg-300px">
            <div class="card">
                <div class="card-body">
                    <!--begin::Nav-->
                    <div class="stepper-nav flex-cente">
                        <!--begin::Step 1-->
                        <div class="stepper-item me-5 current" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Tipo de evento
                                    </h3>

                                    <div class="stepper-desc">

                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 1-->

                        <!--begin::Step 2-->
                        <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--begin::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Informações do evento
                                    </h3>

                                    <div class="stepper-desc">
                                        Description
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 2-->

                        {{-- <!--begin::Step 3-->
                        <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">3</span>
                                </div>
                                <!--begin::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 3
                                    </h3>

                                    <div class="stepper-desc">
                                        Description
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Line-->
                            <div class="stepper-line h-40px"></div>
                            <!--end::Line-->
                        </div>
                        <!--end::Step 3--> --}}

                        {{-- <!--begin::Step 4-->
                        <div class="stepper-item me-5" data-kt-stepper-element="nav">
                            <!--begin::Wrapper-->
                            <div class="stepper-wrapper d-flex align-items-center">
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">4</span>
                                </div>
                                <!--begin::Icon-->

                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">
                                        Step 4
                                    </h3>

                                    <div class="stepper-desc">
                                        Description
                                    </div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 4--> --}}
                    </div>
                    <!--end::Nav-->
                </div>
            </div>
        </div>

        <div class="card mb-4 w-100">
            <div class="card-body">
                <!--begin::Content-->
                <div class="flex-row-fluid">
                    <!--begin::Form-->
                    <form class="form w-lg mx-auto" method="POST" 
                    action="{{route('eventos.store')}}">
                        @csrf
                        <!--begin::Group-->
                        <div class="mb-5">
                            <!--begin::Step 1-->
                            <div class="flex-column current" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Option-->
                                    <input type="radio" class="btn-check" name="tipo" value="Atividade"
                                    id="radio-atividade" checked/>
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                        for="radio-atividade">
                                        <i class="bi bi-clock fs-3x me-4"></i>
                                        <span class="d-block fw-semibold text-start">
                                            <span class="text-dark fw-bold d-block fs-6">Atividade</span>
                                            <span class="text-muted fw-semibold fs-6">
                                                <small> Ação composta por uma única atividade.</small>
                                            </span>
                                        </span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Option-->
                                    <input type="radio" class="btn-check" name="tipo" value="Evento"
                                    id="radio-evento" />
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                        for="radio-evento">
                                        <i class="bi bi-calendar2-event fs-3x me-4"></i>
                                        <span class="d-block fw-semibold text-start">
                                            <span class="text-dark fw-bold d-block fs-6">Evento</span>
                                            <span class="text-muted fw-semibold fs-6">
                                                <small> Ação composta por várias atividades.</small>
                                            </span>
                                        </span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-5">
                                    <!--begin::Option-->
                                    <input type="radio" class="btn-check" name="tipo" value="Projeto"
                                    id="radio-projeto" />
                                    <label
                                        class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                        for="radio-projeto">
                                        <i class="bi bi-kanban fs-3x me-4"></i>
                                        <span class="d-block fw-semibold text-start">
                                            <span class="text-dark fw-bold d-block fs-6">Projeto</span>
                                            <span class="text-muted fw-semibold fs-6">
                                                <small> Projetos diversos.</small>
                                            </span>
                                        </span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Input group-->

                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label" for="nome">Nome</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" 
                                    id="nome" name="nome" placeholder="" value="{{ old('nome') }}" required/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label" for="descricao">Descrição</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-solid" 
                                    rows="3" maxlength="300" id="descricao" name="descricao" placeholder="" 
                                    value="{{ old('descricao') }}"></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row d-flex justify-content-between mb-10">
                                    <div>
                                        <!--begin::Label-->
                                        <label class="form-label" for="data_inicio">Início</label>
                                        <!--end::Label-->
    
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid"
                                        id="data_inicio" name="data_inicio" placeholder="" 
                                        value="{{ old('data_inicio') }}" required/>
                                        <!--end::Input-->
                                    </div>
                                    <div>
                                        <!--begin::Label-->
                                        <label class="form-label" for="data_fim">Fim</label>
                                        <!--end::Label-->
    
                                        <!--begin::Input-->
                                        <input type="date" class="form-control form-control-solid"
                                        id="data_fim" name="data_fim" placeholder="" 
                                        value="{{ old('data_fim') }}" required/>
                                        <!--end::Input-->
                                    </div>

                                </div>
                                <!--end::Input group-->

{{--                                 



                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">Example Label 3</label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" checked="checked" type="checkbox"
                                            value="1" />
                                        <span class="form-check-label">
                                            Checkbox
                                        </span>
                                    </label>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group--> --}}

                            </div>
                            <!--begin::Step 1-->

                            {{-- <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label d-flex align-items-center">
                                        <span class="required">Input 1</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Example tooltip"></i>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="input1"
                                        placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">
                                        Input 2
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="input2"
                                        placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Step 1-->

                            <!--begin::Step 1-->
                            <div class="flex-column" data-kt-stepper-element="content">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label d-flex align-items-center">
                                        <span class="required">Input 1</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Example tooltip"></i>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="input1"
                                        placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">
                                        Input 2
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="input2"
                                        placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label">
                                        Input 3
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" name="input3"
                                        placeholder="" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--begin::Step 1--> --}}
                        </div>
                        <!--end::Group-->

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack">
                            <!--begin::Wrapper-->
                            <div class="me-2">
                                <button type="button" class="btn btn-light btn-active-light-primary"
                                    data-kt-stepper-action="previous">
                                    Voltar
                                </button>
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Wrapper-->
                            <div>
                                <a href="{{route('eventos.index')}}" class="btn btn-danger">
                                    Cancelar
                                </a>
                                
                                <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">
                                        Salvar
                                    </span>
                                    <span class="indicator-progress">
                                        Processando... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                
                                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                    Avançar
                                </button>

                            </div>
                            <!--end::Wrapper-->
                        </div>
                </div>
            </div>
            <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Stepper-->
</x-base-layout>