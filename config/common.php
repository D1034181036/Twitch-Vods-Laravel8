<?php

return [
    'twitch' => [
        'client_id' => env('TWITCH_CLIENT_ID'),
        'client_secret' => env('TWITCH_CLIENT_SECRET'),
    ],
    'secret_code' => env('SECRET_CODE'),
    'update_only_local' => env('UPDATE_ONLY_LOCAL'),
];