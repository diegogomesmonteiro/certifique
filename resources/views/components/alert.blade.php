<div>
     <!--begin::Alert-->
     <div class="alert alert-dismissible bg-{{ $type }} d-flex p-5 align-items-center">
        @if ($type == 'success')
            <!--begin::Icon-->
            <i class="bi bi-check-circle-fill fs-1 text-light"></i>
            <!--end::Icon-->
        @else
            <!--begin::Icon-->
            <i class="bi bi-exclamation-triangle-fill fs-1 text-light"></i>
            <!--end::Icon-->
        @endif
        <!--begin::Wrapper-->
        <div class="text-light">
            <!--begin::Content-->
            <ul class="m-0">
                @foreach ($messages as $message)
                    <li>{{ $message }}</li>
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
    <!--end::Alert-->
</div>