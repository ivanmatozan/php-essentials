<?php

header('Content-Type: application/json');

$users = [
    [
        'id' => 1,
        'name' => 'Ivan',
        'email' => 'ivan@example.com'
    ],
    [
        'id' => 2,
        'name' => 'Dale',
        'email' => 'dale@example.com'
    ],
    [
        'id' => 2,
        'name' => 'Alex',
        'email' => 'alex@example.com'
    ]
];

echo json_encode($users);