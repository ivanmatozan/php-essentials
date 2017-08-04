<?php

require __DIR__ . '/../vendor/autoload.php';

$client = new GuzzleHttp\Client();

try {
    $response = $client->request('POST', 'http://localhost:8888/api/server.php', [
        'form_params' => [
            'text' => 'This is a string'
        ]
    ]);
} catch (\GuzzleHttp\Exception\RequestException $e) {
    echo json_decode($e->getResponse()->getBody())->data->error;
    return;
}

echo json_decode($response->getBody())->data->text;