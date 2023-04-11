@php
    $titulo = '';
@endphp

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="{{ theme()->printHtmlClasses('toolbar-container', false) }} d-flex flex-stack">
        @if (theme()->getOption('layout', 'page-title/display') && theme()->getOption('layout', 'header/left') !== 'page-title')
            <h1>{{ $titulo }}</h1>
        @endif

		<!--begin::Actions-->
        <div class="d-flex align-items-center py-1">
            <!--begin::Wrapper-->
            <div class="me-4">
                <!--begin::Menu-->

                <!--begin::Search-->
            <div
            id="kt_header_search"
            class="d-flex align-items-stretch"

            data-kt-search-keypress="true"
            data-kt-search-min-length="2"
            data-kt-search-enter="enter"
            data-kt-search-layout="menu"

            data-kt-menu-trigger="auto"
            data-kt-menu-overflow="false"
            data-kt-menu-permanent="true"
            data-kt-menu-placement="bottom-end"
            >

            <!--begin::Search toggle-->
            <div class="d-flex align-items-center" data-kt-search-element="toggle" id="kt_header_search_toggle">
                <div class="btn btn-icon btn-active-light-primary btn-custom">
                    {!! theme()->getSvgIcon("icons/duotune/general/gen021.svg", "svg-icon-1") !!}
                </div>
            </div>
            <!--end::Search toggle-->

            <!--begin::Menu-->
            <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
                <!--begin::Wrapper-->
                <div data-kt-search-element="wrapper">
                    {{ theme()->getView('partials/search/partials/_form') }}
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Menu-->
            </div>
            <!--end::Search-->

                <!--end::Menu-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Wrapper-->
            <div data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover" title="Coming soon">
                <a href="#" class="btn btn-sm btn-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_create_account" id="kt_toolbar_create_button">
                    Criar
                </a>
            </div>
            <!--end::Wrapper-->
        </div>
		<!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->



