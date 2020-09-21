<?php

$packageName = 'pro-theme-main';

return [
    'name' => $packageName,

    'menus' => [
        'main' => 'Main',
        'second' => 'Second',
    ],

    'autoload' => [
        'GreenCheap\\ProTheme\\' => 'src'
    ],

    'menu' => [
        'site: theme' => [
            'label' => 'Theme',
            'parent' => 'site',
            'url' => '@site/theme',
            'access' => 'system: access settings',
            'priority' => 20
        ]
    ],

    'positions' => [
        'header-left' => 'Header Left',
        'header-right' => 'Header Right',
        'top-a' => 'Top A',
        'top-b' => 'Top B',
        'top-c' => 'Top C',
        'top-d' => 'Top D',
        'sidebar-right' => 'Sidebar Right',
        'sidebar-left' => 'Sidebar Left',
        'content-top' => 'Content Top',
        'content-bottom' => 'Content Bottom',
        'bottom-a' => 'Bottom A',
        'bottom-b' => 'Bottom B',
        'bottom-c' => 'Bottom C',
        'bottom-d' => 'Bottom D',
        'footer-left'   => 'Footer Left',
        'footer-center' => 'Footer Center',
        'footer-right'  => 'Footer Right',
    ],

    'config' => [
        'general' => [
            'logo' => [
                'logo_contrast' => '',
                'mobile_logo' => '',
                'mobile_contrast' => ''
            ],
            'navbar_button' => [
                'active' => false,
                'title' => '',
                'url' => '',
            ],
            'social_access' => [
                'navbar' => true,
                'footer' => false
            ],
            'socials' => [
                ['icon' => 'twitter','url' => 'https://twitter.com/greencheapnet'],
                ['icon' => 'github','url' => 'https://github.com/greencheap/greencheap'],
                ['icon' => 'greencheap','url' => 'https://greencheap.net']
            ]
        ],
        'navbar' => [
            'style' => 'layout/navbar/style_1.php',
            'components' => ['delay-show' => 0, 'delay-hide' => 100, 'boundary' => 'window', 'boundary-align' => false, 'offset' => 0, 'dropbar' => false, 'dropbar-mode' => 'slide', 'duration' => 200]
        ],
        'mobile' => [
            'style' => 'layout/mobile/style_1.php',
        ],
        'offcanvas' => [
            'style' => 'layout/offcanvas/style_1.php',
        ]
    ],

    'routes' => [
        '/' => [
            'name' => '@site',
            'controller' => 'GreenCheap\\ProTheme\\Controller\\ThemeController'
        ],
    ],

    'events' => [
        'view.system/site/admin/edit' => function($event, $view) use ($app){
            $view->script('node-positions', 'theme:app/bundle/node/node-positions.js', 'site-edit');
            $view->data('$node_positions', $this->get('positions'));
        },

        'view.layout' => function($event , $view) use ($app){
            if($app->isAdmin()){
                return;
            }
                 
            $params = $view->params;
            $params['my_custom_conf'] = 'GreenCheap';

            /**
             * uk-navbar="components" ayırıcı
             */
            $params['theme-navbar-components'] = '';
            foreach($params->get('navbar.components') as $key => $value){
                $data = '';
                $data = $data."'$key':";
                if(is_string($value)){
                    $data = $data."'$value';";
                }else if(is_bool($value)){
                    $data = $data.$value ? true:false;
                }else{
                    $data = $data."$value;";  
                }
                $params['theme-navbar-components'] = $params['theme-navbar-components'].$data;
            };
            /**
             * uk-navbar="components" ayırıcı bitiş
             */
        }
    ]
];
