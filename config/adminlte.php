<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Sistema</b>Produccion',
    'logo_img' => 'vendor/adminlte/dist/img/favicon.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */
     //clses en modelo user 
    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info',
    'usermenu_image' => false,//true para habilirar imagen
    'usermenu_desc' => true,//para los roles
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-fw text-light',
    'classes_auth_btn' => 'btn-flat btn-light',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-success elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => false,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        //barra de busqueda en el menu izquierdo
        [
            'type' => '',
            'text' => 'search',
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'text'    => 'Cotizaciones',
            'icon'    => 'fas fa-file-alt',
            'can'     => 'main_menu',
            'submenu' => [
                [
                    'text' => 'Nueva Cotizacion',
                    'url'  => 'cotizaciones/create',
                    'icon'    => 'fas fa-edit',
                ],
                [
                    'text' => 'Listado',
                    'url'  => 'cotizaciones',
                    'icon' => 'nav-icon fas fa-table',
                ],
            ],
        ],

        [
            'text'    => 'Produccion de Pedidos',
            'icon'    => 'fas fa-pencil-ruler',
            'can'      =>    'produccion.index',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'produccion',
                    'icon'    => 'nav-icon fas fa-table',
                ],
                [
                    'text' => 'Produciendo',
                    'url'  => 'produccion/produciendo',
                    'icon' => 'fas fa-hard-hat',
                ],
                [
                    'text' => 'Sin Asignar',
                    'url'  => 'produccion/sin_asignar',
                    'icon' =>'	fas fa-exclamation',
                ],
                [
                    'text' => 'Entregados',
                    'url'  => 'produccion/entregados',
                    'icon'=>'fas fa-handshake',
                ],
            ],
        ],
        [
            'text'    => 'Pedidos',
            'icon'    => 'fas fa-cart-arrow-down',
            'can'     => 'main_menu',
            'submenu' => [
/*                 [
                    'text' => 'Nuevo Pedido',
                    'url'  => 'pedidos/create',
                    'icon'=>'fas fa-plus-circle',
                ], */
                [
                    'text' => 'Listado',
                    'url'  => 'pedidos',
                    'icon'    => 'nav-icon fas fa-table',
                    
                ],
            ],
        ],
        [
            'text'    => 'Ingresos',
            'icon'    => 'fas fa-truck',
            'can' =>'ingresos.crud',
            'submenu' => [
                [
                    'text' => 'Nuevo Ingreso',
                    'url'  => 'ingresos/create',
                    'icon'=>'fas fa-plus-circle',
                ],
                [
                    'text' => 'Listado',
                    'url'  => 'ingresos',
                    'icon' => 'nav-icon fas fa-table',
                    
                ],
            ],
        ],

        //anadido recien
        [
            'text'    => 'Articulos',
            'icon'    => 'fas fa-briefcase',
            'can'     => 'main_menu',
            'submenu' => [
                [
                    'text' => 'Crear',
                    'url'  => 'articulos/create',
                    'icon' => 'fas fa-tshirt',
                ],
                [
                    'text' => 'Listado',
                    'url'  => 'articulos',
                    'icon'    => 'nav-icon fas fa-table',
                    
                    
                ],

                [
                    'text' => 'Categorias',
                    'url'  => 'categoria_articulos',
                    'icon'=> 'fas fa-shapes',
                ],
            ],
        ],
        [
            'text'    => 'Insumos',
            'icon'    => 'fas fa-luggage-cart',
            'can' =>'insumos.crud',
            'submenu' => [
                [
                    'text' => 'Crear',
                    'url'  => 'insumos/create',
                    'icon'=>'fas fa-calendar-plus',
                ],
                [
                    'text' => 'Listado',
                    'url'  => 'insumos',
                    'icon'    => 'nav-icon fas fa-table',
                    
                ],

                [
                    'text' => 'Categorias',
                    'url'  => 'categoria_insumos',
                    'icon'=> 'fas fa-shapes',
                ],
            ],
        ],
        ['header' => 'PERSONAS','can'     => 'main_menu'],
        [
            'text'    => 'Clientes',
            'icon'    => 'fas fa-fw fa-user',
            'can'     => 'main_menu',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'clientes',
                    'icon' => 'fas fa-address-card',
                    
                ],

                [
                    'text' => 'Crear',
                    'url'  => 'clientes/create',
                    'icon'=>'fas fa-user-plus',
                ],
            ],
        ],
        [
            'text'    => 'Proveedores',
            'icon'    => 'fas fa-user-tie',
            'can' =>'proveedores.crud',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'proveedores',
                    'icon'    => 'nav-icon fas fa-table',
                    
                ],

                [
                    'text' => 'Crear',
                    'url'  => 'proveedores/create',
                    'icon'=>'fas fa-user-plus',
                ],
            ],
        ],
        [
            'text'    => 'Encargado de produccion',
            'icon'    => 'fas fa-user-friends',
            'can' =>'encargados.crud',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'encargado_producciones',
                    'icon'    => 'nav-icon fas fa-table',
                    
                ],

                [
                    'text' => 'Crear',
                    'url'  => 'encargado_producciones/create',
                    'icon'=>'fas fa-user-plus',
                ],
            ],
        ],
        [
            'text'    => 'Usuarios',
            'icon'    => 'fas fa-users',
            'can' =>'usuarios.crud',
            'submenu' => [
                [
                    'text' => 'Listado',
                    'url'  => 'usuarios',
                    'icon'    => 'nav-icon fas fa-table',
                    
                ],

                [
                    'text' => 'Crear',
                    'url'  => 'usuarios/create',
                    'icon'=>'fas fa-user-plus',
                ],
                [
                    'text' => 'Usuarios Bloqueados',
                    'url'  => 'usuarios/b_list',
                    'icon'=>'fas fa-user-alt-slash',
                ],
            ],
        ],
        ['header' => 'DETALLES DE ARTICULOS','can'     => 'main_menu'],
        [
            'text'    => 'Detalles',
            'icon'    => 'fas fa-tools',
            'can'     => 'main_menu',
            'submenu' => [
                [
                    'text' => 'Tallas',
                    'url'  => 'tallas',
                    'icon'=>'fas fa-ruler-combined',
                ],
                [
                    'text' => 'Materiales',
                    'url'  => 'materiales',
                    'icon'=>'fas fa-tint',
                ],
            ],
        ],
        ['header' => 'DATOS DE EMPRESA','can'     => 'insumos.crud'],
        [
            'text'    => 'Empresa',
            'icon'    => 'fas fa-building',
            'can' =>'empresa.crud',
            'submenu' => [
                [
                    'text' => 'Gestionar',
                    'url'  => 'empresas',
                    'icon'=>'fas fa-money-check',  
                ],
            ],
        ],
        /* ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'user/profile',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ], */
        /* ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ], */
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
