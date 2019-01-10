<?php
return [
    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'mailtrap.io'),
    'port' => env('MAIL_PORT', 2525),
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'home_loc@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'Diana'),
    ],
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'username' => env('MAIL_USERNAME'),
    'password' => env('MAIL_PASSWORD'),
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => [
        'theme' => 'default',
        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
];
