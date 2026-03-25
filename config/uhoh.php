<?php

return [
    'enabled' => env("UHOH_ENABLED", "true"),

    'index_file_path' => env("UHOH_INDEX_FILE_PATH"), // defaults to public_path('index.php')

    'checksums' => [
        'c96ed6bbe80f9105534af4d1510dc79f0143e6843970dba7ddd4ec7d03097cab', // laravel 10,
        '8e8554cc123b541ff4abb247fb40fc93aa42877376c1296f3cf8106350c52e8b', // laravel 11,
        'eba77cba39695b6bd091fe5211d481f7ebb2ce2d8d26230b5a609465d0a4aff9', // laravel 12
    ],
];
