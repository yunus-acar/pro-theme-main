<?php

use GreenCheap\ProTheme\ThemeHelper;

$packageName = 'pro-theme-main';

$generalThemeOptions = [
    'section' => [
        'section' => 'uk-section',
        'size' => '',
        'id' =>  '',
        'class' =>  '',
        'dom' => ''
    ],
    'background' => [
        'image' => [
            'src' =>  '',
            'alt' =>  ''
        ],
        'size' => 'uk-background-cover',
        'position' => '',
        'repeat' => false,
        'fixed' => false,
        'blend' => ''
    ],
    'container' => [
        'container' => 'uk-container',
        'id' =>  '',
        'class' =>  '',
        'dom' => ''
    ]
];

$generalPositionsOptions = [
    'visible' => [
        'large' => true,
        'desktop' => true,
        'tablet' => true,
        'mobile' => true
    ],
    'stacked' => false,
    'grids' => [
        '@xl' => 'uk-child-width-1-4',
        '@l' => 'uk-child-width-1-3',
        '@m' => 'uk-child-width-1-2',
        '@s' => 'uk-child-width-1-1'
    ],
    'grid_config' => [
        'gap' => '',
        'divider' => false,
        'match' => false,
        'masonry' => false,
        'parallax' => 150,
        'id' =>  '',
        'class' =>  '',
        'dom' => ''
    ],
];

return [
    'name' => $packageName,

    'main' => function ($app) {
    },

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
        'headerleft' => 'Header Left',
        'headerright' => 'Header Right',
        'topa' => 'Top A',
        'topb' => 'Top B',
        'topc' => 'Top C',
        'topd' => 'Top D',
        'sidebarright' => 'Sidebar Right',
        'contenttop' => 'Content Top',
        'contentbottom' => 'Content Bottom',
        'bottoma' => 'Bottom A',
        'bottomb' => 'Bottom B',
        'bottomc' => 'Bottom C',
        'bottomd' => 'Bottom D',
        'footer'  => 'Footer',
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
                ['icon' => 'twitter', 'url' => 'https://twitter.com/greencheapnet'],
                ['icon' => 'github', 'url' => 'https://github.com/greencheap/greencheap'],
                ['icon' => 'greencheap', 'url' => 'https://greencheap.net']
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

    'node' => array_merge($generalThemeOptions, [
        'layers' => [
            'top' => $generalThemeOptions,
            'bottom' => $generalThemeOptions,
            'main' => $generalThemeOptions,
            'footer' => $generalThemeOptions,
        ],
    ]),

    'widget' => [
        'card' => [
            'card' => 'uk-card',
            'size' => 'uk-card-body',
            'hover' => false,
            'id' => '',
            'class' => '',
            'dom' => ''
        ],
        'title_hide' => true,
        'alias_title' => '',
        'background' => [
            'image' => [
                'src' =>  '',
                'alt' =>  ''
            ],
            'size' => 'uk-background-cover',
            'position' => '',
            'repeat' => false,
            'fixed' => false,
            'blend' => ''
        ],
    ],

    'routes' => [
        '/' => [
            'name' => '@site',
            'controller' => 'GreenCheap\\ProTheme\\Controller\\ThemeController'
        ],
    ],

    'events' => [
        'view.system/site/admin/edit' => function ($event, $view) use ($app, $generalThemeOptions, $generalPositionsOptions) {
            $view->script('node-positions', 'theme:app/bundle/node/node-positions.js', ['site-edit']);
            $view->script('node-theme', 'theme:app/bundle/node/node-theme.js', ['site-edit']);
            $view->data('$node_positions', $this->get('positions'));
            $view->data('$general_theme_node_options', $generalThemeOptions);
            $view->data('$general_theme_positions_options', array_merge($generalPositionsOptions, $generalThemeOptions));
        },

        'view.system/widget/edit' => function ($event, $view) {
            $view->script('widget-theme', 'theme:app/bundle/widgets/widget-theme.js', ['widget-edit']);
        },

        'view.layout' => function ($event, $view) use ($app, $generalPositionsOptions, $generalThemeOptions) {
            if ($app->isAdmin()) {
                return;
            }

            $params = $view->params;
            $params['protheme'] = new ThemeHelper($this);
            $params['default_theme_option'] = $generalThemeOptions;
            $params['default_positions_option'] = $generalPositionsOptions;

            /**
             * uk-navbar="components" ayırıcı
             */
            $params['theme-navbar-components'] = '';
            foreach ($params->get('navbar.components') as $key => $value) {
                $data = '';
                $data = $data . "'$key':";
                if (is_string($value)) {
                    $data = $data . "'$value';";
                } else if (is_bool($value)) {
                    $data = $data . $value ? true : false;
                } else {
                    $data = $data . "$value;";
                }
                $params['theme-navbar-components'] = $params['theme-navbar-components'] . $data;
            };
            /**
             * uk-navbar="components" ayırıcı bitiş
             */
        }
    ]
];
