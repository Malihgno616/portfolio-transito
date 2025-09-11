<?php 

session_start();

require __DIR__.'/model/FormDeficienteModel.php';

use Model\FormDeficienteModel;

$deficienteModel = new FormDeficienteModel();

if (isset($_GET['id']) && isset($_GET['type'])) {

    $id = $_GET['id'];
    $type = $_GET['type'] ?? 'copia-rg-beneficiario';

    $beneficiarioImgs = $deficienteModel->getBeneficiarioById($id);

    switch($type) {
        case "copia-rg-beneficiario":
            if ($beneficiarioImgs && $beneficiarioImgs['copia_rg_beneficiario'] && $type === "copia-rg-beneficiario") {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimeType = $finfo->buffer($beneficiarioImgs['copia_rg_beneficiario']);
                header("Content-Type: " . $mimeType);
                echo $beneficiarioImgs['copia_rg_beneficiario'];
                exit;
            }
            break;
        case "atestado-medico":
            if ($beneficiarioImgs && $beneficiarioImgs['atestado_medico']) {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimeType = $finfo->buffer($beneficiarioImgs['atestado_medico']);
                header("Content-Type: " . $mimeType);
                echo $beneficiarioImgs['atestado_medico'];
                exit;
            }
            break;
        case "copia-rg-representante":
            if ($beneficiarioImgs && $beneficiarioImgs['copia_rg_representante']) {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimeType = $finfo->buffer($beneficiarioImgs['copia_rg_representante']);
                header("Content-Type: " . $mimeType);
                echo $beneficiarioImgs['copia_rg_representante'];
                exit;
            }
            break;
        case "comprovante-representante":
            if ($beneficiarioImgs && $beneficiarioImgs['comprovante_representante']) {
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mimeType = $finfo->buffer($beneficiarioImgs['comprovante_representante']);
                header("Content-Type: " . $mimeType);
                echo $beneficiarioImgs['comprovante_representante'];
                exit;
            }
            break;
    }
            
}

header("Content-Type: image/png");
readfile(__DIR__.'/path/to/default-image.png');
exit;