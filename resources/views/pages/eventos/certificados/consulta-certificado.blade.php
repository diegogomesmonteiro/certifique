<x-auth-layout>

    <!--begin::Signin Form-->
    <form method="POST" action="{{ route('certificados.show') }}">
        @csrf

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3">
                {{ __('Consulte a autenticidade do certificado aqui.') }}
            </h1>
            <!--end::Title-->
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="form-label fs-6 fw-bolder text-dark">{{ __('Código de autenticação') }}</label>
            <!--end::Label-->

            <!--begin::Input-->
            <input class="form-control form-control-lg form-control-solid text-center" type="text" name="autenticacao"
                autocomplete="off" value="{{ old('autenticacao') }}" required autofocus />
            <!--end::Input-->
            @if(session()->has('danger'))
            <div class="fv-plugins-message-container">
                <div data-field="autenticacao" data-validator="notEmpty" class="fv-help-block">{{ session()->get('danger') }}</div>
            </div>
            @endif
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="text-center">
            <!--begin::Submit button-->
            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                @include('partials.general._button-indicator', ['label' => __('Buscar')])
            </button>
            <!--end::Submit button-->
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Signin Form-->
</x-auth-layout>