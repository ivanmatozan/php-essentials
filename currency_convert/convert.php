<?php

require __DIR__ . '/../vendor/autoload.php';

$client = new GuzzleHttp\Client();

$response = $client->request('GET', 'http://api.fixer.io/latest', [
    'query' => [
        'base' => $_GET['from'],
        'symbols' => $_GET['to']
    ]
]);

$result = json_decode($response->getBody());

$converted = number_format($result->rates->{$_GET['to']} * $_GET['value'], 2);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency conversion</title>
</head>
<body>
    <?= htmlspecialchars($_GET['value'], ENT_QUOTES, 'utf-8') ?>
    <?= htmlspecialchars($_GET['from'], ENT_QUOTES, 'utf-8') ?>

    is

    <?= $converted ?>
    <?= htmlspecialchars($_GET['to'], ENT_QUOTES, 'utf-8') ?>
</body>
</html>
