<x-auth-layout>

    <!--begin::Signup Form-->
    <form method="POST" action="{{ theme()->getPageUrl('register') }}" class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
    @csrf

    <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Criar uma conta') }}
            </h1>
            <!--end::Title-->

            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">
                {{ __('Já possui uma conta?') }}

                <a href="{{ theme()->getPageUrl('login') }}" class="link-primary fw-bolder">
                    {{ __('Clique aqui!') }}
                </a>
            </div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->
{{--         
        <!--begin::Action-->
        <button type="button" class="btn btn-light-primary fw-bolder w-100 mb-10">
            <img alt="Logo" src="{{ asset('media/svg/brand-logos/google-icon.svg') }}" class="h-20px me-3"/>
            {{ __('Sign in with Google') }}
        </button>
        <!--end::Action-->

        <!--begin::Separator-->
        <div class="d-flex align-items-center mb-10">
            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
            <span class="fw-bold text-gray-400 fs-7 mx-2">{{ __('OR') }}</span>
            <div class="border-bottom border-gray-300 mw-50 w-100"></div>
        </div>
        <!--end::Separator--> --}}

        <!--begin::Input group-->
        <div class="row fv-row mb-7">
            <!--begin::Col-->
            <div class="col-xl-6">
                <label class="form-label fw-bolder text-dark fs-6">{{ __('Primeiro nome') }}</label>
                <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" autocomplete="off" value="{{ old('first_name') }}"/>
            </div>
            <!--end::Col-->

            <!--begin::Col-->
            <div class="col-xl-6">
                <label class="form-label fw-bolder text-dark fs-6">{{ __('Sobrenome') }}</label>
                <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" autocomplete="off" value="{{ old('last_name') }}"/>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <label class="form-label fw-bolder text-dark fs-6">{{ __('E-mail') }}</label>
            <input class="form-control form-control-lg form-control-solid" type="email" name="email" autocomplete="off" value="{{ old('email') }}"/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">
                    {{ __('Senha') }}
                </label>
                <!--end::Label-->

                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="new-password"/>

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->

                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Hint-->
            <div class="text-muted">
                {{ __('Use o mínimo de 8 characteres utilizando letras, números e caracteres especiais.') }}
            </div>
            <!--end::Hint-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group-->
        <div class="fv-row mb-5">
            <label class="form-label fw-bolder text-dark fs-6">{{ __('Confirmar senha') }}</label>
            <input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" autocomplete="off"/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        {{-- <div class="fv-row mb-10">
            <label class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1"/>
                <span class="form-check-label fw-bold text-gray-700 fs-6">
                {{ __('I Agree &') }} <a href="#" class="ms-1 link-primary">{{ __('Terms and conditions') }}</a>.
            </span>
            </label>
        </div> --}}
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                @include('partials.general._button-indicator', ['label' => 'Salvar', 'message' => 'Salvando...'])
            </button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Signup Form-->

</x-auth-layout>
