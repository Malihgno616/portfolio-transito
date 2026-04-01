<?php 

require __DIR__ . '/vendor/autoload.php';

require __DIR__.'/models/News.php';

use Predis\Client;

use Models\News;

$newsModel = new News();

$redis = new Client([
    'scheme' => 'tcp',
    'host'   => '127.0.0.1',
    'port'   => 6379,
]);

echo $redis->ping();