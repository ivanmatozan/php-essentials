<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== ' POST') {
    return;
}

if (!isset($_POST['text'])) {
    http_response_code(400);
    echo json_encode([
        'data' => [
            'error' => 'Text is required'
        ]
    ]);

    die();
}

$text = strrev($_POST['text']);

http_response_code(400);

echo json_encode([
    'data' => [
        'text' => $text
    ]
]);