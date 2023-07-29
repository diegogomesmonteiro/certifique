<!--begin::Container-->
<div id="kt_content_container" class="{{ theme()->printHtmlClasses('content-container', false) }}">
    
    @if ($errors->any())
    <x-alert type="danger" :messages="$errors->all()" />
    @endif
    @if (session()->has('success'))
    <x-alert type="success" :messages="[session()->get('success')]" />
    @endif
    @if (session()->has('danger'))
    <x-alert type="danger" :messages="[session()->get('danger')]" />
    @endif
    {{-- <!--begin::Alert-->
    <div class="alert alert-dismissible bg-success d-flex p-5 align-items-center">
        <!--begin::Icon-->
        <i class="bi bi-exclamation-triangle-fill fs-1 text-light"></i>
        <!--end::Icon-->

        <!--begin::Wrapper-->
        <div class="text-light">
            <!--begin::Content-->
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <i class="bi bi-x-square-fill fs-1 text-light"></i>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert--> --}}
    {{ $slot }}
</div>
<!--end::Container-->
