<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],   // rota API
    'allowed_methods' => ['*'],                    // aceita todos os métodos
    'allowed_origins' => ['*'],                    // aceita qualquer origem
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],                    // aceita qualquer header
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];