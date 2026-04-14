<?php 

session_start();

header("Content-Type: text/event-stream; charset=utf-8");
header("Cache-Control: no-cache");
header("Connection: keep-alive");
header("X-Accel-Buffering: no");
date_default_timezone_set('America/Sao_Paulo');

require __DIR__.'/model/NotificacaoModel.php';

use Model\NotificacaoModel;

session_write_close();
ignore_user_abort(true);
set_time_limit(0);

while (ob_get_level() > 0) {
    ob_end_clean();
}

echo "data: " . json_encode(['status' => 'connected', 'time' => date('H:i:s')]) . "\n\n";
flush();

$lastSended = null;
$iterationCount = 0;
$notificacaoModel = null;

while (true) {
    
    try {
        if ($iterationCount % 10 === 0 || $notificacaoModel === null) {
            if ($notificacaoModel !== null) {
                unset($notificacaoModel);
            }
            $notificacaoModel = new NotificacaoModel();
        }
        
        $notificacao = $notificacaoModel->getLastNotification($lastSended);
        
        if ($notificacao && isset($notificacao['id']) && $notificacao['id'] != $lastSended) {
            echo "data: " . json_encode($notificacao, JSON_UNESCAPED_UNICODE) . "\n\n";
            $lastSended = $notificacao['id'];
            flush();
        }
        
        $iterationCount++;

        if ($iterationCount % 5 === 0) {
            echo ": heartbeat " . date('H:i:s') . "\n\n";
            flush();
        }
        
    } catch (Exception $e) {
        error_log("SSE Error: " . $e->getMessage());
        $notificacaoModel = null;
        sleep(2);
    }
    
    if (connection_aborted()) {
        break;
    }
    
    sleep(1);
}