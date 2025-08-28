<?php 
require __DIR__.'/model/FormIdosoModel.php';

use Model\FormIdosoModel;

$formIdosoModel = new FormIdosoModel();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $type = $_GET['type'] ?? 'idoso';

    // Buscar imagem do idoso
    $idoso = $formIdosoModel->getIdosoById($id);
    
    if ($idoso && $idoso['copia_rg_idoso'] && $type === 'idoso') {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($idoso['copia_rg_idoso']);
        header("Content-Type: " . $mimeType);
        echo $idoso['copia_rg_idoso']; // <- AQUI É IMPORTANTE
        exit;
    }

    if ($idoso && $idoso['copia_rg_representante'] && $type === 'representante') {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($idoso['copia_rg_representante']);
        header("Content-Type: " . $mimeType);
        echo $idoso['copia_rg_representante']; // <- AQUI TAMBÉM
        exit;
    }

    if ($idoso && $idoso['comprovante_representante'] && $type === 'comprovante') {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($idoso['comprovante_representante']);
        header("Content-Type: " . $mimeType);
        echo $idoso['comprovante_representante']; // <- E AQUI
        exit;
    }
}

header("Content-Type: image/png");
readfile(__DIR__.'/path/to/default-idoso-image.png');
exit;