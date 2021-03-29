<?php

return [
    'key_private' => env('KEY_PRIVATE','../config/server.key'),
    'id_app' => env('ID_APP', '1'),
    'api_log' => env('API_LOG'),
    'api_imagem' => env('API_IMAGEM'),
    'api_agpadmin' => env('API_AGPADMIN'),
    'queue_name' => env('QUEUE_NAME'),
    'imagem_dir' => env('IMAGEM_DIR', null),
    'imagem_disk' => env('IMAGEM_DISK', null),
];
