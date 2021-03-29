<?php
// Header menu
return [

    'items' => [
        [],
        [
            'title' => 'Início',
            'desc' => 'Página inicial.',
            'icon' => 'media/svg/icons/Home/Home.svg', // or can be 'flaticon-light' or any flaticon-*
            'root' => true,
            'route' => true,
            'page' => 'web.home', //'/',
            'new-tab' => false,
        ],
    ]
];
