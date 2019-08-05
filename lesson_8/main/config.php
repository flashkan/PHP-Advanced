<?php
return [
    'rootName' => $_SERVER['DOCUMENT_ROOT'] . '/../',
    'name' => 'Мой магазин',
    'defaultControllerName' => 'good',
    'components' => [
        'bd' => [
            'class' => \App\services\BD::class,
            'config' => [
                'user' => 'root',
                'pass' => '',
                'driver' => 'mysql',
                'bd' => 'test',
                'host' => 'localhost:3307',
                'charset' => 'UTF8',
            ]

        ],
        'UserRepository' => [
            'class' => \App\models\repositories\UserRepository::class
        ]
    ],
];