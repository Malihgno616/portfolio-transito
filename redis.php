<?php 

require __DIR__ . '/vendor/autoload.php';
use Predis\Client;

$redis = new Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => 6379,
]);

echo $redis->ping(); // Deve retornar PONG