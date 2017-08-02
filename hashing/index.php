<?php

$string = 'ivan1234';
$salt = 'abcdef';
$randomSalt = 'xyz';

echo md5($string); // Bad
echo sha1($string); // Bad
echo hash('sha256', $string . $salt . $randomSalt); // Less bad


$password =  password_hash($string, PASSWORD_DEFAULT, ['cost' => 12]);

var_dump(password_get_info($password));

$dbPassword = '$2y$12$f0zHSrwsKI600TIQJPUlkuWjtf1hFVVcu57YTcFUKhPzkqg9C7ao6';
if (password_verify($string, $dbPassword)) {
    if (password_needs_rehash($dbPassword, PASSWORD_DEFAULT, ['cost' => 12])) {
        $newHash = password_hash($string, PASSWORD_DEFAULT, [
            'cost' => 12
        ]);
    }

    echo 'You are in';
}