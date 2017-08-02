<?php

require __DIR__ . '/../vendor/autoload.php';

$domain = 'sandbox33333333333333333333.mailgun.org';

$client = new \Http\Adapter\Guzzle6\Client();
$mail = new \Mailgun\Mailgun('key-sdfsdfsdfsfsdfsdfsdf', $client);

$mail->sendMessage($domain, [
    'from' => 'test@example.com',
    'to' => 'example@gmail.com',
    'subject' => 'test',
    'text' => 'testis'
], [
    'attachment' => [
        'views/file'
    ]
]);

