<?php 

session_start();

header("Content-Type: text/event-stream; charset=utf-8");

header("Cache-Control: no-cache");

header('Connection: keep-alive');

date_default_timezone_set('America/Sao_Paulo');

require __DIR__.'/model/NotificacaoModel.php';

use Model\NotificacaoModel;

$notificacaoModel = new NotificacaoModel();

while (true) {
    
    $notificacao = $notificacaoModel->getLastNotification();

    if ($notificacao) {
        echo 'Info: '. json_encode($notificacao, JSON_UNESCAPED_UNICODE);
        echo "\n\n";
    }

    if (ob_get_level() > 0) ob_flush();
    flush();

    sleep(10);
}