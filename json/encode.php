<?php

$response = file_get_contents('http://localhost:8888/json/users.php');

$users = json_decode($response);