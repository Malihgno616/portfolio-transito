<?php 

require __DIR__.'/model/FormIdosoModel.php';

use Model\FormIdosoModel;

$formIdosoModel = new FormIdosoModel();

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

$inputPost = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

// Idoso
$nomeIdoso = $inputPost['nome-idoso'];
$nascIdoso = $inputPost['nasc-idoso'];
$sexoIdoso = $inputPost['sexo-idoso'];
$endIdoso = $inputPost['end-idoso'];
$numIdoso = $inputPost['num-idoso'];
$compIdoso = $inputPost['comp-idoso'] ?? "";
$bairroIdoso = $inputPost['bairro-idoso'];
$cepIdoso = $inputPost['cep-idoso'];
$cidadeIdoso = $inputPost['cidade-idoso'];
$ufIdoso = $inputPost['uf-idoso'];
$telIdoso = $inputPost['tel-idoso'];
$rgIdoso = $inputPost['rg-idoso'];
$dataExpIdoso = $inputPost['data-exp-idoso'];
$expedidoIdoso = $inputPost['expedido-idoso'];
$cnhIdoso = $inputPost['cnh-idoso'] ?? "";
$validadeCnhIdoso = $inputPost['validade-cnh-idoso'] ?? "";
$emailIdoso = $inputPost['email-idoso'] ?? "";

// Cópia do RG do Idoso
if (isset($_FILES['copia-rg-idoso']) && $_FILES['copia-rg-idoso']['error'] === UPLOAD_ERR_OK) {

    $fileContentIdoso = file_get_contents($_FILES['copia-rg-idoso']['tmp_name']);

    $finto = new finfo(FILEINFO_MIME_TYPE);

    $mimeTypeIdoso = $finto->file($_FILES['copia-rg-idoso']['tmp_name']);

    if (!in_array($mimeTypeIdoso, ['image/jpeg', 'image/png'])) {
        die('Tipo de arquivo inválido. Apenas JPEG e PNG são permitidos.');
    }

    $copiaRgIdoso = $fileContentIdoso;  

} 

$nomeAqvRgIdoso = $inputPost['nome-aqv-rg-idoso'];

// Representante
$nomeRep = $inputPost['nome-rep'] ?? "";
$emailRep = $inputPost['email-rep'] ?? "";
$endRep = $inputPost['end-rep'] ?? "";
$numRep = $inputPost['num-rep'] ?? "";
$compRep = $inputPost['comp-rep'] ?? "";
$bairroRep = $inputPost['bairro-rep'] ?? "";
$cepRep = $inputPost['cep-rep'] ?? "";
$cidadeRep = $inputPost['cidade-rep'] ?? "";
$ufRep = $inputPost['uf-rep'] ?? "";
$telRep = $inputPost['tel-rep'] ?? "";
$rgRep = $inputPost['rg-rep'] ?? "";
$dataExpRep = $inputPost['data-exp-rep'] ?? "";
$expedidoRep = $inputPost['expedido-rep'] ?? "";

// Cópia do RG do Representante
if (isset($_FILES['copia-rg-rep']) && $_FILES['copia-rg-rep']['error'] === UPLOAD_ERR_OK) {
    $fileContentRep = file_get_contents($_FILES['copia-rg-rep']['tmp_name']);

    $fintoRep = new finfo(FILEINFO_MIME_TYPE);

    $mimeTypeRep = $fintoRep->file($_FILES['copia-rg-rep']['tmp_name']);

    if (!in_array($mimeTypeRep, ['image/jpeg', 'image/png'])) {
        die('Tipo de arquivo inválido. Apenas JPEG e PNG são permitidos.');
    }

    $copiaRgRep = $fileContentRep;  
} else {
    $copiaRgRep = null;
}

$nomeAqvRgRep = $inputPost['nome-aqv-rg-rep'] ?? "";

// Comprovante do Representante
if (isset($_FILES['comprovante-rep']) && $_FILES['comprovante-rep']['error'] === UPLOAD_ERR_OK) {
    $fileContentCompRep = file_get_contents($_FILES['comprovante-rep']['tmp_name']);

    $fintoCompRep = new finfo(FILEINFO_MIME_TYPE);

    $mimeTypeCompRep = $fintoCompRep->file($_FILES['comprovante-rep']['tmp_name']);

    if (!in_array($mimeTypeCompRep, ['image/jpeg', 'image/png'])) {
        die('Tipo de arquivo inválido. Apenas JPEG e PNG são permitidos.');
    }

    $comprovanteRep = $fileContentCompRep;

} else {
    $comprovanteRep = null;
}

$nomeAqvCompRep = $inputPost['nome-aqv-comp-rep'] ?? "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {
        $formIdosoModel->registerIdoso(
        $nomeIDoso, 
        $nascIdoso,
        $sexoIdoso,
        $endIdoso,
        $numIdoso, 
        $bairroIdoso, 
        $cepIdoso, 
        $cidadeIdoso, 
        $ufIdoso, 
        $telIdoso, 
        $rgIdoso, 
        $dataExpIdoso, 
        $expedidoIdoso, 
        $copiaRgIdoso, 
        $nomeAqvRgIdoso, 
        $compIdoso, 
        $cnhIdoso, 
        $validadeCnhIdoso, 
        $emailIdoso,  
        $nomeRep, 
        $emailRep, 
        $endRep, 
        $numRep, 
        $compRep, 
        $bairroRep, 
        $cepRep, 
        $cidadeRep, 
        $ufRep, 
        $telRep, 
        $rgRep, 
        $dataExpRep, 
        $expedidoRep, 
        $copiaRgRep,
        $nomeAqvRgRep,
        $comprovanteRep,
        $nomeAqvCompRep
        );    

        $_SESSION['alert-idoso'] = setAlert("Cadastro realizado com sucesso!", "success");
        header("Location: tab-idoso.php");
        exit();
        
    } catch(Exception $e) {
        $_SESSION['alert-idoso'] = setAlert("Erro ao processar o formulário: " . $e->getMessage(), "error");
        header("Location: tab-idoso.php");
        exit();
    }
 

}