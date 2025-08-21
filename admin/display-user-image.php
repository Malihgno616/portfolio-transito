<?php 
require __DIR__.'/model/UsersModel.php';

use UsersModel\UsersModel\UsersModel;

$usersModel = new UsersModel();

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    
    if ($type === 'user') {
        // Buscar imagem do usuário
        $user = $usersModel->getUser($id);
        if ($user && $user['img_usuario']) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($user['img_usuario']);
            header("Content-Type: " . $mimeType);
            echo $user['img_usuario'];
            exit;
        }
    }
}

header("Content-Type: image/png");
readfile(__DIR__.'/path/to/default-user-image.png');
exit;