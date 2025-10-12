<?php

return [
    'colors' => [
        'primary' => 'crimson',
        'secondary' => 'emerald',
        'accent' => 'violet',
        'warning' => 'amber',
        'success' => 'green',
        'danger' => 'red',
        'info' => 'blue',
    ],
    
    'fonts' => [
        'sans' => 'Instrument Sans',
        'arabic' => 'Noto Sans Arabic',
    ],
    
    'spacing' => [
        'sidebar_width' => '16rem',
        'sidebar_collapsed' => '4rem',
        'header_height' => '4rem',
    ],
    
    'components' => [
        'use_flowbite' => true,
        'rtl_support' => true,
        'dark_mode' => false,
    ],
    
    'dashboard' => [
        'layout' => 'layouts.dashboard',
        'components_path' => 'components.dashboard',
        'css_file' => 'dashboard.css',
    ],
    
    'navigation' => [
        'default_items' => [
            'dashboard' => [
                'label' => 'Dashboard',
                'icon' => 'dashboard',
                'url' => '#',
                'active_pattern' => 'admin/dashboard'
            ],
            'courses' => [
                'label' => 'Courses',
                'icon' => 'book',
                'url' => '#',
                'active_pattern' => 'courses'
            ],
            'users' => [
                'label' => 'Users',
                'icon' => 'users',
                'url' => '#',
                'active_pattern' => 'users'
            ],
            'analytics' => [
                'label' => 'Analytics',
                'icon' => 'chart',
                'url' => '#',
                'active_pattern' => 'analytics'
            ],
            'settings' => [
                'label' => 'Settings',
                'icon' => 'settings',
                'url' => '#',
                'active_pattern' => 'settings'
            ],
        ]
    ],
    
    'rtl' => [
        'enabled' => true,
        'languages' => ['ar'],
        'default_direction' => 'ltr',
    ],
];

