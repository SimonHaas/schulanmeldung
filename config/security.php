<?php

// app/config/security.php
use App\Security\AdminLoginAuthenticator;

$container->loadFromExtension('security', [
    'encoders' => [
        'App\Entity\User' => [
            'algorithm' => 'bcrypt',
            'cost' => 12,
        ]
    ],
    'firewalls' => [
        'main' => [
            // ...,
            'guard' => [
                'authenticators' => [
                    AdminLoginAuthenticator::class,
                ]
            ],
        ],
    ],
]);