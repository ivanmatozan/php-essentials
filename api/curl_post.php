<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://localhost:8888/api/server.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    'text' => 'cURL is fun!'
]);

$result = curl_exec($ch);

if (curl_getinfo($ch)['http_code'] !== 200) {
    $result = json_decode($result);
    echo $result->data->error;

    die();
}

$response = json_decode($result);

echo $response->data->text;