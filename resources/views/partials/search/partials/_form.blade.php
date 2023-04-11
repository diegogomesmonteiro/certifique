<!--begin::Form-->
<form data-kt-search-element="form" class="w-100 position-relative mb-3" autocomplete="off">
    <!--begin::Icon-->
    {!! theme()->getSvgIcon("icons/duotune/general/gen021.svg", "svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 translate-middle-y ms-0") !!}
    <!--end::Icon-->

    <!--begin::Input-->
    <input type="text" class="form-control form-control-flush ps-10" name="search" value="" placeholder="Search..." data-kt-search-element="input"/>
    <!--end::Input-->

    <!--begin::Spinner-->
    <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1" data-kt-search-element="spinner">
        <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
    </span>
    <!--end::Spinner-->

    <!--begin::Reset-->
    <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none" data-kt-search-element="clear">
        {!! theme()->getSvgIcon("icons/duotune/arrows/arr061.svg", "svg-icon-2 svg-icon-lg-1 me-0") !!}
    </span>
    <!--end::Reset-->
</form>
<!--end::Form-->