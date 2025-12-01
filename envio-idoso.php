<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/models/FormIdoso.php';

use Model\FormIdoso;

$formIdoso = new FormIdoso();

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

$_SESSION['old-form-idoso'] = [
    'nome-idoso' => $inputPost['nome-idoso'] ?? '', 
    'nascimento-idoso' => $inputPost['nascimento-idoso'] ?? '', 
    'genero-idoso' => $inputPost['genero-idoso'] ?? '', 
    'endereco-idoso' => $inputPost['endereco-idoso'] ?? '', 
    'numero-endereco-idoso' => $inputPost['numero-endereco-idoso'] ?? '', 
    'bairro-idoso' => $inputPost['bairro-idoso'] ?? '',
    'cep-idoso' => $inputPost['cep-idoso'] ?? '', 
    'cidade-idoso' => $inputPost['cidade-idoso'] ?? '', 
    'uf-idoso' => $inputPost['uf-idoso'] ?? '', 
    'telefone-idoso' => $inputPost['telefone-idoso'] ?? '',
    'rg-idoso' => $inputPost['rg-idoso'] ?? '', 
    'data-expedicao-idoso' => $inputPost['data-expedicao-idoso'] ?? '', 
    'expedido-idoso' => $inputPost['expedido-idoso'] ?? ''
];

$nomeIdoso = $inputPost["nome-idoso"];
$nascimentoIdoso = $inputPost["nascimento-idoso"];
$generoIdoso = $inputPost["genero-idoso"];
$enderecoIdoso = $inputPost["endereco-idoso"];
$numEnderecoIdoso = $inputPost["numero-endereco-idoso"];
$complementoIdoso = $inputPost["complemento-idoso"] ?? null;
$bairroIdoso = $inputPost["bairro-idoso"];
$cepIdoso = $inputPost["cep-idoso"];
$cidadeIdoso = $inputPost["cidade-idoso"];
$ufIdoso = $inputPost["uf-idoso"];
$telIdoso = $inputPost["telefone-idoso"];
$rgIdoso = $inputPost["rg-idoso"];
$expedicaoIdoso = $inputPost["data-expedicao-idoso"];
$expedidoIdoso = $inputPost["expedido-idoso"];
$cnhIdoso = $inputPost["cnh-idoso"] ?? null;
$validadeCnhIdoso = isset($inputPost['validade-cnh-idoso']) && $inputPost['validade-cnh-idoso'] !== '' ? $inputPost['validade-cnh-idoso'] : null;
$emailIdoso = $inputPost["email-idoso"] ?? null;
$nomeRepresentante = $inputPost["nome-representante"] ?? null;
$emailRepresentante = $inputPost["email-representante"] ?? null;
$enderecoRepresentante = $inputPost["endereco-representante"] ?? null;
$numEnderecoRepresentante = $inputPost["numero-endereco-representante"] ?? null;
$complementoRepresentante = $inputPost["complemento-representante"] ?? null;
$bairroRepresentante = $inputPost["bairro-representante"] ?? null;
$cepRepresentante = $inputPost["cep-representante"] ?? null;
$cidadeRepresentante = $inputPost["cidade-representante"] ?? null;
$ufRepresentante = $inputPost["uf-representante"] ?? null;
if ($ufRepresentante === 'selecione' || $ufRepresentante === '') {
    $ufRepresentante = null; 
}
$telRepresentante = $inputPost["telefone-representante"] ?? null;
$rgRepresentante = !empty($inputPost['rg-representante']) ? $inputPost['rg-representante'] : null;
$expedicaoRepresentante = $inputPost["expedicao-representante"] ?? null;
if ($expedicaoRepresentante === '') {
    $expedicaoRepresentante = null;
}
$expRepresentante = $inputPost["expedido-representante"] ?? null;

$required = [
    'nome-idoso', 'nascimento-idoso', 'genero-idoso', 
    'endereco-idoso', 'numero-endereco-idoso', 'bairro-idoso',
    'cep-idoso', 'cidade-idoso', 'uf-idoso', 'telefone-idoso',
    'rg-idoso', 'data-expedicao-idoso', 'expedido-idoso'
]; 

$errorArray = [];
foreach ($required as $campo) {
    if (empty($inputPost[$campo])) {
        $errorArray[$campo] = "Este campo é obrigatório, preencha este campo";
    }
}

if (!empty($errorArray)) {
    $_SESSION['err-fields'] = $errorArray;
    $_SESSION['idoso-alert'] = setAlert("Por favor, preencha todos os campos obrigatórios.", "error");
    header("Location: formulario-idoso");
    exit();
}

// Processamento dos arquivos
if (isset($_FILES['copia-rg-idoso']) && $_FILES['copia-rg-idoso']['error'] === 0 && $_FILES['copia-rg-idoso']['tmp_name'] !== '') {
    $copiaRgIdoso = $_FILES['copia-rg-idoso']['tmp_name'];
    $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    if (in_array(mime_content_type($copiaRgIdoso), $tiposPermitidos)) {
        $imagemIdoso = file_get_contents($copiaRgIdoso); 
    } else {
        $_SESSION['idoso-alert'] = setAlert("Arquivo não permitido para RG do idoso.", "error");
        header("Location: formulario-idoso");
        exit();
    }
} else {
    $_SESSION['idoso-alert'] = setAlert("Erro no envio do arquivo da cópia do RG do idoso.", "error");
    header("Location: formulario-idoso");
    exit();
} 

$nomeArquivoRgIdoso = $inputPost['nome-arquivo-rg-idoso']; 

if (isset($_FILES['copia-rg-representante']) && $_FILES['copia-rg-representante']['error'] == 0) {
    $copiaRgRepresentante = $_FILES['copia-rg-representante']['tmp_name'];
    $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    if (in_array(mime_content_type($copiaRgRepresentante), $tiposPermitidos)) {
        $imagemRgRepresentante = file_get_contents($copiaRgRepresentante);
    } else {
        $_SESSION['idoso-alert'] = setAlert("Arquivo não permitido para RG do representante.", "error");
        header("Location: formulario-idoso");
        exit();
    }
} elseif (empty($_FILES['copia-rg-representante']['name'])) {
    $imagemRgRepresentante = null;
} else {
    $_SESSION['idoso-alert'] = setAlert("Erro no envio do arquivo da cópia do RG do representante.", "error");
    header("Location: formulario-idoso");
    exit();
}   

$nomeArquivoRgRep = $inputPost['nome-arquivo-rg-rep'] ?? '';

if (isset($_FILES['comprovante-representante']) && $_FILES['comprovante-representante']['error'] == 0) {
    $comprovanteRepresentante = $_FILES['comprovante-representante']['tmp_name'];
    $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    if (in_array(mime_content_type($comprovanteRepresentante), $tiposPermitidos)) {
        $imagemCompRepresentante = file_get_contents($comprovanteRepresentante); 
    } else {
        $_SESSION['idoso-alert'] = setAlert("Arquivo não permitido para comprovante do representante.", "error");
        header("Location: formulario-idoso");
        exit();
    }
} elseif (empty($_FILES['comprovante-representante']['name'])) {
    $imagemCompRepresentante = null;
} else {
    $_SESSION['idoso-alert'] = setAlert("Erro no envio do arquivo do comprovante do representante.", "error");
    header("Location: formulario-idoso");
    exit();
}

$nomeArquivoCompRep = $inputPost['nome-arquivo-comp-rep'] ?? '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $minimumAge = 60;
    $birthDate = DateTime::createFromFormat('d/m/Y', $nascimentoIdoso);
    $currentDate = new DateTime(); 
    $ageInterval = $currentDate->diff($birthDate);
    $age = $ageInterval->y;

    if (!$birthDate) {
        $_SESSION['idoso-alert'] = setAlert("Data de nascimento inválida. Use o formato dd/mm/aaaa.", "error");
        header("Location: formulario-idoso");
        exit();
    }

    if ($age < $minimumAge) {
        $_SESSION['idoso-alert'] = setAlert("O formulário é exclusivo para pessoas com 60 anos ou mais.", "error");
        header("Location: formulario-idoso");
        exit();
    }

    $partsDate = explode('/', $nascimentoIdoso);

    $day = (int)$partsDate[0];
    $month = (int)$partsDate[1];
    $year = (int)$partsDate[2];
    
    if ($month < 1 || $month > 12 || $day < 1 || $day > 31) {
        $_SESSION['idoso-alert'] = setAlert("Data de nascimento inválida.", "error");
        header("Location: formulario-idoso");
        exit();
    } 

    $partsDateExpedicao = explode('/', $expedicaoIdoso);

    $dayExp = (int)$partsDateExpedicao[0];
    $monthExp = (int)$partsDateExpedicao[1];
    $yearExp = (int)$partsDateExpedicao[2];

    if ($monthExp < 1 || $monthExp > 12 || $dayExp < 1 || $dayExp > 31) {
        $_SESSION['idoso-alert'] = setAlert("Data de expedição do RG inválida.", "error");
        header("Location: formulario-idoso");
        exit();
    }

    if($yearExp > date('Y')) {
        $_SESSION['idoso-alert'] = setAlert("Data de expedição do RG inválida.", "error");
        header("Location: formulario-idoso");
        exit();
    }

    try {
        $result = $formIdoso->sendIdoso(
            $nomeIdoso, 
            $nascimentoIdoso,
            $generoIdoso, 
            $enderecoIdoso, 
            $numEnderecoIdoso,
            $bairroIdoso, 
            $cepIdoso, 
            $cidadeIdoso, 
            $ufIdoso, 
            $telIdoso, 
            $rgIdoso, 
            $expedicaoIdoso, 
            $expedidoIdoso, 
            $imagemIdoso,
            $nomeArquivoRgIdoso, 
            $complementoIdoso, 
            $cnhIdoso, 
            $validadeCnhIdoso, 
            $emailIdoso, 
            $nomeRepresentante, 
            $emailRepresentante, 
            $enderecoRepresentante, 
            $numEnderecoRepresentante, 
            $complementoRepresentante, 
            $bairroRepresentante, 
            $cepRepresentante, 
            $cidadeRepresentante, 
            $ufRepresentante, 
            $telRepresentante, 
            $rgRepresentante, 
            $expedicaoRepresentante, 
            $expRepresentante,
            $imagemRgRepresentante,
            $nomeArquivoRgRep, 
            $imagemCompRepresentante, 
            $nomeArquivoCompRep
        );

        if ($result === true) {
            $_SESSION['idoso-alert'] = setAlert("Informações enviadas com sucesso!", 'success');
            $formIdoso->sendNotification("NOVO CARTÃO PARA ". $nomeIdoso, "CARTÃO DO IDOSO");
            unset($_SESSION['old-form-idoso']);
            unset($_SESSION['err-fields']);
        } else {
            $_SESSION['idoso-alert'] = setAlert("Erro ao enviar o formulário. Por favor, tente novamente.", 'error');
        }
        
    } catch(Exception $e) {
        $_SESSION['idoso-alert'] = setAlert("Erro ao enviar o formulário: " . $e->getMessage(), 'error');
    }
    
    header("Location: formulario-idoso");
    exit();
}