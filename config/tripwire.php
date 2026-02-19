<?php

return [
    'enabled' => env("TRIPWIRE_ENABLED", "true"),

    'index_file_path' => env("TRIPWIRE_INDEX_FILE_PATH"), // defaults to public_path('index.php')
];
