<?php
// Aside menu
return [

    'items' => [
        // Dashboard
        [
            'title' => 'Início',
            'desc' => 'Página inicial.',
            'icon' => 'media/svg/icons/Home/Home.svg', // or can be 'flaticon-light' or any flaticon-*
            'root' => true,
            'route' => true,
            'page' => 'web.home',
            'new-tab' => false,
        ],

        // Cadastros
        [
            'section' => 'Principais',
        ],
        [
            'title' => 'Clientes',
            'desc' => 'Visualize seus queridos clientes.',
            'icon' => 'media/svg/icons/Communication/Adress-book2.svg', // or can be 'flaticon-light' or any flaticon-*
            'bullet' => 'dot',
            'route' => true,
            'page' => 'web.pessoa.index',
        ],

        [
            'section' => 'Mais opções',
        ],
        [
            'title' => 'Configurações',
            'desc' => 'Veja a comunicação com outros sistemas',
            'icon' => 'media/svg/icons/General/Settings-1.svg',
            'bullet' => 'dot',
            'root' => false,
            'submenu' => [
                [
                    'title' => 'Webhooks',
                    'desc' => 'Veja a comunicação com outros sistemas.',
                    'icon' => 'flaticon2-rocket', // or can be 'flaticon-light' or any flaticon-*
                    'route' => true,
                    'page' => 'web.settings',
                ],
            ]
        ],
        [
            'title' => 'Log de acessos',
            'desc' => 'Veja as ações dos usuários',
            'icon' => 'media/svg/icons/Communication/Shield-user.svg',
            'bullet' => 'dot',
            'root' => false,
            'submenu' => [
                [
                    'title' => 'Registros de login',
                    'desc' => 'Veja os acessos de usuários.',
                    'icon' => 'media/svg/icons/General/Shield-check.svg', // or can be 'flaticon-light' or any flaticon-*
                    'route' => true,
                    'page' => 'web.relatorio-usuario-acesso',
                ],
            ]
        ],
        [
            'title' => 'Ajuda',
            'desc' => '',
            'icon' => 'media/svg/icons/Communication/Chat2.svg',
            'bullet' => 'dot',
            'root' => true,
            'submenu' => [
                [
                    'title' => 'Fórum de discuções',
                    'route' => false,
                    'page' => 'https://www.agapesolucoes.com.br/forum/categories/agp',
                    'toggle' => 'click',
                    'new-tab' => true,
                ],
            ]
        ],

    ]

];
