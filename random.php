<?php

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*_?';
$randomString = '';

for ($i = 0; $i < 10; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
}

echo $randomString; // Outputs a random 8-character string with special characters

?>