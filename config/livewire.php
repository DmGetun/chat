<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Temporary File Uploads
    |--------------------------------------------------------------------------
    |
    | Livewire supports uploading files as a temporary "draft" and then
    | finalizing them after validation. These options configure that behavior.
    |
    */

    'temporary_file_upload' => [
        'disk' => env('LIVEWIRE_DISK', 'local'),
        'rules' => null,
        'directory' => null,
        'middleware' => null,
        'preview_mimes' => [
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
            'mov', 'avi', 'wmv', 'mp3', 'm4a', 'jpg', 'jpeg', 'webp',
        ],
        'max_upload_time' => 5, // Minutes
    ],
];
