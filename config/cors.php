<?php
return [
    'paths' => ['api/*', 'storage/*'], // Path yang diizinkan
    'allowed_methods' => ['*'], // Metode HTTP yang diizinkan
    'allowed_origins' => ['*'], // Tambahkan domain Flutter
    'allowed_headers' => ['*'], // Header yang diizinkan
    'supports_credentials' => true,
];