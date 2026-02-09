<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/../../models/Request.php';

use Models\Request;

function setAlert($message, $type = 'success') {
    $colorClass = $type === 'success' 
        ? 'text-green-800 bg-green-50' 
        : 'text-red-800 bg-red-50';
    
    return <<<HTML
    <div id="alert-3" class="flex items-center p-4 mb-4 rounded-lg $colorClass w-15" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-lg font-medium">
            $message 
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 hover:bg-opacity-80 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    HTML;  
}

$infosPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$rgBeneficiario = $infosPost['rg-beneficiario'];

if (isset($_FILES['boletim']) && $_FILES['boletim']['error'] === UPLOAD_ERR_OK) {
    $fileContentBoletim = file_get_contents($_FILES['boletim']['tmp_name']);

    $finfoBoletim = new finfo(FILEINFO_MIME_TYPE);

    $mimeTypeBoletim = $finfoBoletim->file($_FILES['boletim']['tmp_name']);

    if (!in_array($mimeTypeBoletim, ['image/jpeg', 'image/png'])) {
        die('Tipo de arquivo inválido. Apenas JPEG e PNG são permitidos.');
    }

    $imgBoletim = $fileContentBoletim;  
}

$imgBoletimName = $infosPost['img-bo'];

try {

    $request = new Request();

    $result = $request->send2aViaRequest($rgBeneficiario, $imgBoletim, $imgBoletimName);

    if($result) {
        $_SESSION['furto-roubo-alert'] = setAlert("Solicitação enviada com sucesso!");
        $request->sendNotification("SOLICITAÇÃO DA 2ª VIA ENVIADA PARA O RG: $rgBeneficiario", "SEGUNDA VIA: FURTO/ROUBO");
        header("Location: ../../furto-roubo");
        exit();
    } else {
        $_SESSION['furto-roubo-alert'] = setAlert("Ocorreu um erro ao enviar sua solicitação. Por favor, tente novamente.", "error");
        header("Location: ../../furto-roubo");
        exit();
    }
    
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    $_SESSION['furto-roubo-alert'] = setAlert("Ocorreu um erro ao processar sua solicitação. Por favor, tente novamente.", "error");
    header("Location: ../../furto-roubo");
    exit();
}
