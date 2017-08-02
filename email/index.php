<?php

require __DIR__ . '/../vendor/autoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPDebug = 2; // Set zero on production
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'username';
$mail->Password = 'password';

$username = 'alex';

ob_start();
require 'views/welcome.php';
$data = ob_get_clean();

$mail->setFrom('test@example.com');
$mail->addAddress('example@gmail.com');
$mail->Subject = 'Mail test';
$mail->msgHTML($data);
$mail->AltBody = 'Hi there';
$mail->addAttachment('files/file');

if (!$mail->send()) {
    echo $mail->ErrorInfo;
    die();
}

echo 'sent';