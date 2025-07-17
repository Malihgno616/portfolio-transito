<?php
$password = "ackinteste";

$options = [
  'cost' => 15
];

$hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
echo "Hash da senha: " . $hashedPassword;

