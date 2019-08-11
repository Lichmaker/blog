<?php

return [

    'services' => [
        'github' => [
            'driver' => \Shield\GitHub\GitHub::class,
            'options' => [
                'token' => env('GITHUB_WEBHOOK_SECRET'),
            ]
        ]
    ]

];
