<?php 

session_start();

header("Content-Type: text/event-stream; charset=utf-8");
header("Cache-Control: no-cache");
header('Connection: keep-alive');
date_default_timezone_set('America/Sao_Paulo');

require __DIR__.'/model/NotificacaoModel.php';

use Model\NotificacaoModel;

session_write_close();
ignore_user_abort(true);
set_time_limit(0);

$notificacaoModel = new NotificacaoModel();

$lastSended = null;

while (true) {
    
    $notificacao = $notificacaoModel->getLastNotification($lastSended);

    if ($notificacao && $notificacao['id'] != $lastSended) {
        echo 'Info: '. json_encode($notificacao, JSON_UNESCAPED_UNICODE);
        echo "\n\n";
        
        $lastSended = $notificacao['id'];

        if (ob_get_level() > 0) ob_flush();
        flush();
    }

    sleep(1);
}