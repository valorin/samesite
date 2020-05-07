<?php

return [
    'home' => env('SAMESITE_HOME'),
    'external' => env('SAMESITE_EXTERNAL'),
    'shared' => env('SAMESITE_SHARED'),

    'insecure' => [
        'home' => env('SAMESITE_INSECURE_HOME'),
        'external' => env('SAMESITE_INSECURE_EXTERNAL'),
        'shared' => env('SAMESITE_INSECURE_SHARED'),
    ],
];
