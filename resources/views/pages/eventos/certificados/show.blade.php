<x-auth-layout>

    <!--begin::Heading-->
    <div class="text-center mb-10">
        <!--begin::Title-->
        <h1 class="text-dark mb-3">
            {{ __('Dados do certificado:') }}
        </h1>
        <!--end::Title-->
    </div>

    <!--begin::Input group-->
    <div class="fv-row mb-10">
        <p>Nome: {{ $participante->nome }}</p>
        <p>Certificado: {{ $evento->nome }}</p>
        <p>Gerado em: {{ $certificado->created_at->format('d/m/Y') }}</p>
    </div>
    <!--end::Input group-->

    <!--begin::Actions-->
    <div class="text-center">
        <a href="{{ route('certificados.download', $certificado) }}" target="blank">
            <!--begin::Submit button-->
            <button class="btn btn-lg btn-primary w-100 mb-5">
                {{-- @include('partials.general._button-indicator', ['label' => __('Download')]) --}}
                Download
            </button>
            <!--end::Submit button-->
        </a>
    </div>
    <!--end::Actions-->
</x-auth-layout>
