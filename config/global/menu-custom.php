<?php

use App\Enums\RolesEnum;

return array(
    // Main menu
    'main'          => array(

        //// Modules
        array(
            'classes' => array('content' => 'pt-2 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Gestão de Sistema</span>',
            'role'    => RolesEnum::SUPER_ADMIN->value,
        ),

        //Usuários
        array(
            'title'      => 'Usuários',
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com014.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'role'    => RolesEnum::SUPER_ADMIN->value,
            'sub'        => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title'  => 'Gerenciar',
                        'path'   => 'users',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // System
        // array(
        //     'title'      => 'Sistema',
        //     'icon'       => array(
        //         'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/coding/cod001.svg", "svg-icon-2"),
        //         'font' => '<i class="bi bi-layers fs-3"></i>',
        //     ),
        //     'classes'    => array('item' => 'menu-accordion'),
        //     'attributes' => array(
        //         "data-kt-menu-trigger" => "click",
        //     ),
        //     'role'    => RolesEnum::SUPER_ADMIN->value,
        //     'sub'        => array(
        //         'class' => 'menu-sub-accordion menu-active-bg',
        //         'items' => array(
        //             array(
        //                 'title'  => 'Auditoria',
        //                 'path'   => 'log/audit',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //             array(
        //                 'title'  => 'Log do Sistema',
        //                 'path'   => 'log/system',
        //                 'bullet' => '<span class="bullet bullet-dot"></span>',
        //             ),
        //         ),
        //     ),
        // ),

        // Separator
        array(
            'content' => '<div class="separator mx-1 my-4"></div>',
            'role'    => RolesEnum::SUPER_ADMIN->value,
        ),

        array(
            'classes' => array('content' => 'pt-2 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Administração</span>',
            'role'    => [RolesEnum::SUPER_ADMIN->value, RolesEnum::ADMIN->value],
        ),

        //Eventos
        array(
            'title'      => 'Eventos',
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/files/fil012.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'role'    => [RolesEnum::SUPER_ADMIN->value, RolesEnum::ADMIN->value],
            'sub'        => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title'  => 'Cadastrar',
                        'path'   => 'eventos/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Listar',
                        'path'   => 'eventos',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Separator
        array(
            'content' => '<div class="separator mx-1 my-4"></div>',
            'role'    => [RolesEnum::SUPER_ADMIN->value, RolesEnum::ADMIN->value],
        ),

        array(
            'classes' => array('content' => 'pt-2 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">Meus Certificados</span>',
            'role'    => [RolesEnum::SUPER_ADMIN->value, RolesEnum::ADMIN->value, RolesEnum::USER->value],
        ),

        //Meus Eventos
        array(
            'title'      => 'Meus Certificados',
            'icon'       => array(
                'svg'  => theme()->getSvgIcon("demo1/media/icons/duotune/files/fil025.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes'    => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'role'    => [RolesEnum::SUPER_ADMIN->value, RolesEnum::ADMIN->value, RolesEnum::USER->value],
            'sub'        => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title'  => 'Certificados',
                        'path'   => 'eventos',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),


    ),

    // Horizontal menu
    'horizontal'    => array(
        // Dashboard
        array(
            'title'   => 'Dashboardds',
            'path'    => '',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Resources
        array(
            'title'      => 'Resources',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    // Documentation
                    array(
                        'title' => 'Documentation',
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/abstract/abs027.svg", "svg-icon-2"),
                        'path'  => 'documentation/getting-started/overview',
                    ),

                    // Changelog
                    array(
                        'title' => 'Changelog v' . theme()->getVersion(),
                        'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
                        'path'  => 'documentation/getting-started/changelog',
                    ),
                ),
            ),
        ),

        // Account
        array(
            'title'      => 'Account',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title'  => 'Overview',
                        'path'   => 'account/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Settings',
                        'path'   => 'account/settings',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'      => 'Security',
                        'path'       => '#',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title"             => "Coming soon",
                                "data-bs-toggle"    => "tooltip",
                                "data-bs-trigger"   => "hover",
                                "data-bs-dismiss"   => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                ),
            ),
        ),

        // System
        array(
            'title'      => 'System',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title'      => 'Settings',
                        'path'       => '#',
                        'bullet'     => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title"             => "Coming soon",
                                "data-bs-toggle"    => "tooltip",
                                "data-bs-trigger"   => "hover",
                                "data-bs-dismiss"   => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title'  => 'Audit Log',
                        'path'   => 'log/audit',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'System Log',
                        'path'   => 'log/system',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
    ),
);