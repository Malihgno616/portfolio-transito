<?php 
session_start();

require __DIR__.'/models/FormDeficiente.php';

use Models\FormDeficiente;

$formDeficiente = new FormDeficiente();

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

$required = [
    'nome-beneficiario','nascimento-beneficiario','genero-beneficiario',
    'endereco-beneficiario','numero-beneficiario','bairro-beneficiario',
    'cep-beneficiario','cidade-beneficiario','uf-beneficiario',
    'telefone-beneficiario','rg-beneficiario','expedicao-beneficiario',
    'expedido-beneficiario','nome-medico','crm-medico','telefone-medico',
    'local-atendimento-medico','cid'
];

// Verifica se é uma requisição POST
if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['old-form-def'] = [
        'nome-beneficiario' => $inputPost['nome-beneficiario'] ?? '',
        'nascimento-beneficiario' => $inputPost['nascimento-beneficiario'] ?? '',
        'genero-beneficiario' => $inputPost['genero-beneficiario'] ?? '',
        'endereco-beneficiario' => $inputPost['endereco-beneficiario'] ?? '',
        'numero-beneficiario' => $inputPost['numero-beneficiario'] ?? '',
        'bairro-beneficiario' => $inputPost['bairro-beneficiario'] ?? '',
        'cep-beneficiario' => $inputPost['cep-beneficiario'] ?? '',
        'cidade-beneficiario' => $inputPost['cidade-beneficiario'] ?? '',
        'uf-beneficiario' => $inputPost['uf-beneficiario'] ?? '',
        'telefone-beneficiario' => $inputPost['telefone-beneficiario'] ?? '',
        'rg-beneficiario' => $inputPost['rg-beneficiario'] ?? '',
        'expedicao-beneficiario' => $inputPost['expedicao-beneficiario'] ?? '',
        'expedido-beneficiario' => $inputPost['expedido-beneficiario'] ?? '',
        'nome-medico' => $inputPost['nome-medico'] ?? '',
        'crm-medico' => $inputPost['crm-medico'] ?? '',
        'telefone-medico' => $inputPost['telefone-medico'] ?? '',
        'local-atendimento-medico' => $inputPost['local-atendimento-medico'] ?? '',
        'cid' => $inputPost['cid'] ?? ''
    ];

    $errorArray = [];
    foreach ($required as $campo) {
        if (empty($inputPost[$campo])) {
            $errorArray[$campo] = "Este campo é obrigatório, preencha este campo";
        }
    }

    if (!empty($errorArray)) {
        $_SESSION['error'] = $errorArray;
        $_SESSION['alert-deficiente'] = setAlert("Por favor, preencha todos os campos obrigatórios.", 'error');
        // Ajuste o caminho conforme a estrutura do seu projeto
        header("Location: form-deficiente.php");
        exit();
    }

    // Dados do beneficiario
    $nomeBeneficiario = $inputPost['nome-beneficiario'];
    $nascBeneficiario = $inputPost['nascimento-beneficiario'];
    $generoBeneficiario = $inputPost['genero-beneficiario'];
    $enderecoBeneficiario = $inputPost['endereco-beneficiario'];
    $numeroBeneficiario = $inputPost['numero-beneficiario'];
    $complementoBeneficiario = $inputPost['complemento-beneficiario'] ?? null;
    $bairroBeneficiario = $inputPost['bairro-beneficiario'];
    $cepBeneficiario = $inputPost['cep-beneficiario'];
    $cidadeBeneficiario = $inputPost['cidade-beneficiario'];
    $ufBeneficiario  = $inputPost['uf-beneficiario'];
    $telBeneficiario = $inputPost['telefone-beneficiario'];
    $rgBeneficiario = $inputPost['rg-beneficiario'];
    $expedicaoBeneficiario = $inputPost['expedicao-beneficiario'];
    $expedidoBeneficiario = $inputPost['expedido-beneficiario'];
    $cnhBeneficiario = $inputPost['cnh-beneficiario'] ?? null;
    $validadeCnhBeneficiario = isset($inputPost['validade-cnh-beneficiario']) && $inputPost['validade-cnh-beneficiario'] !== '' ? $inputPost['validade-cnh-beneficiario'] : null;
    $emailBeneficiario = $inputPost['email-beneficiario'] ?? null;

    // imagem do rg do beneficiario
    $imgRgBeneficiario = null;
    if (isset($_FILES['copia-rg-beneficiario']['tmp_name']) && $_FILES['copia-rg-beneficiario']['error'] === UPLOAD_ERR_OK){
        $copiaRgBeneficiario = $_FILES['copia-rg-beneficiario']['tmp_name'];
        $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
        if(in_array(mime_content_type($copiaRgBeneficiario), $tiposPermitidos)){
            $imgRgBeneficiario = file_get_contents($copiaRgBeneficiario);
        } else {
            $_SESSION['error'] = "Arquivo não permitido para cópia do RG do beneficiário";
            header("Location: form-deficiente.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Erro ao enviar a cópia do rg do beneficiário: " . $_FILES['copia-rg-beneficiario']['error'];
        header("Location: form-deficiente.php");
        exit;
    }

    $nomeArquivoRgBenef = $inputPost['nome-arquivo-rg-benef'] ?? null;

    $nomeMedico = $inputPost['nome-medico'];
    $crmMedico = $inputPost['crm-medico'];
    $telefoneMedico = $inputPost['telefone-medico'];
    $localAtendimentoMedico = $inputPost['local-atendimento-medico'];
    $deficienciaAmbulatoria = isset($inputPost['deficiencia-ambulatoria']) ? implode(", ", $inputPost['deficiencia-ambulatoria']) : '';
    $restricaoMedica = $inputPost['restricao-medica'];
    $dataInicio = $inputPost['data-inicio'];
    $dataFim = ($inputPost['data-fim'] ?? null);
    if ($dataFim === '') {
        $dataFim = null;
    }
    $cid = $inputPost['cid'];
    
    // imagem do atestado médico
    $imgAtestadoMedico = null;
    if (isset($_FILES['atestado-medico']['tmp_name']) && $_FILES['atestado-medico']['error'] === UPLOAD_ERR_OK){
        $atestadoMedico = $_FILES['atestado-medico']['tmp_name'];
        $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
        if(in_array(mime_content_type($atestadoMedico), $tiposPermitidos)){
            $imgAtestadoMedico = file_get_contents($atestadoMedico);
        } else {
            $_SESSION['error'] = "Arquivo não permitido para atestado médico";
            header("Location: form-deficiente.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Erro ao enviar o atestado médico: " . $_FILES['atestado-medico']['error'];
        header("Location: form-deficiente.php");
        exit;
    }

    $nomeArquivoAtestado = $inputPost['nome-arquivo-atestado'] ?? null;

    // Dados do representante
    $nomeRepresentante = $inputPost['nome-representante'] ?? null;
    $emailRepresentante = $inputPost['email-representante'] ?? null;
    $enderecoRepresentante = $inputPost['endereco-representante'] ?? null;
    $numRepresentante = $inputPost['numero-representante'] ?? null;
    $complementoRepresentante = $inputPost['complemento-representante'] ?? null;
    $bairroRepresentante = $inputPost['bairro-representante'] ?? null;
    $cepRepresentante = $inputPost['cep-representante'] ?? null;
    $cidadeRepresentante = $inputPost['cidade-representante'] ?? null;
    $ufRepresentante = $inputPost['uf-representante'] ?? null;
    if ($ufRepresentante === 'selecione' || $ufRepresentante === '') {
        $ufRepresentante = null; 
    }
    $telRepresentante = $inputPost['telefone-representante'] ?? null;
    $rgRepresentante = !empty($inputPost['rg-representante']) ? $inputPost['rg-representante'] : null;
    $expedicaoRepresentante = $inputPost['expedicao-representante'] ?? null;
    if($expedicaoRepresentante === '' ){
        $expedicaoRepresentante = null;
    }
    $expedidoRepresentante = $inputPost['expedido-representante'] ?? null;
    
    $imagemRgRepresentante = null;
    if (isset($_FILES['copia-rg-representante']) && $_FILES['copia-rg-representante']['error'] == 0) {
        $copiaRgRepresentante = $_FILES['copia-rg-representante']['tmp_name'];
        $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
        if (in_array(mime_content_type($copiaRgRepresentante), $tiposPermitidos)) {
            $imagemRgRepresentante = file_get_contents($copiaRgRepresentante);
        } else {
            $_SESSION['error'] = "Arquivo não permitido para cópia do RG do representante";
            header("Location: form-deficiente.php");
            exit;
        }
    } elseif (empty($_FILES['copia-rg-representante']['name'])) {
        $imagemRgRepresentante = null;
    } else {
        $_SESSION['error'] = "Erro no envio do arquivo da cópia do RG do representante: " . $_FILES['copia-rg-representante']['error'];
        header("Location: form-deficiente.php");
        exit;
    }   

    $nomeArquivRgRep = $inputPost['nome-arquivo-rg-rep-def'] ?? null;

    $imagemCompRepresentante = null;
    if (isset($_FILES['comprovante-representante']) && $_FILES['comprovante-representante']['error'] == 0) {
        $comprovanteRepresentante = $_FILES['comprovante-representante']['tmp_name'];
        $tiposPermitidos = ['image/jpeg', 'image/png', 'application/pdf'];
        if (in_array(mime_content_type($comprovanteRepresentante), $tiposPermitidos)) {
            $imagemCompRepresentante = file_get_contents($comprovanteRepresentante); 
        } else {
            $_SESSION['error'] = "Arquivo não permitido para comprovante do representante";
            header("Location: form-deficiente.php");
            exit;
        }
    } elseif (empty($_FILES['comprovante-representante']['name'])) {
        $imagemCompRepresentante = null;
    } else {
        $_SESSION['error'] = "Erro no envio do arquivo do comprovante do representante: " . $_FILES['comprovante-representante']['error'];
        header("Location: form-deficiente.php");
        exit;
    }

    $nomeArquivCompRep = $inputPost['nome-arquivo-comp-rep-def'] ?? null;
    
    $result = $formDeficiente->sendDeficiente(
        $nomeBeneficiario,
        $nascBeneficiario,
        $generoBeneficiario,
        $enderecoBeneficiario,
        $numeroBeneficiario,
        $bairroBeneficiario,
        $cepBeneficiario,
        $cidadeBeneficiario,
        $ufBeneficiario,
        $telBeneficiario,
        $rgBeneficiario,
        $expedicaoBeneficiario,
        $expedidoBeneficiario,
        $imgRgBeneficiario,
        $nomeArquivoRgBenef, 
        $nomeMedico,
        $crmMedico,
        $telefoneMedico, 
        $localAtendimentoMedico,
        $deficienciaAmbulatoria,
        $restricaoMedica,
        $dataInicio,
        $cid,
        $imgAtestadoMedico, 
        $nomeArquivoAtestado,
        $complementoBeneficiario,
        $cnhBeneficiario,
        $validadeCnhBeneficiario,
        $emailBeneficiario, 
        $dataFim,
        $nomeRepresentante,
        $emailRepresentante,
        $enderecoRepresentante,
        $numRepresentante, 
        $complementoRepresentante, 
        $bairroRepresentante,
        $cepRepresentante,
        $cidadeRepresentante,
        $ufRepresentante,
        $telRepresentante,
        $rgRepresentante,
        $expedicaoRepresentante,
        $expedidoRepresentante,
        $imagemRgRepresentante,
        $nomeArquivRgRep,
        $imagemCompRepresentante, 
        $nomeArquivCompRep
    );

    $idBeneficiario = $formDeficiente->lastInsertId();

    if($result) {
        $_SESSION['alert-deficiente'] = setAlert("Formulário enviado com sucesso!", 'success');
        $formDeficiente->sendNotification("NOVO CARTÃO PARA ". $nomeBeneficiario, "CARTÃO DEFICIENTE", "detalhes-card-deficiente.php?id-beneficiario=".$idBeneficiario);
        unset($_SESSION['old-form-def']);
    } else {
        $_SESSION['alert-deficiente'] = setAlert("Erro ao enviar o formulário!");
    }
    
    // Redireciona de volta para o formulário
    header("Location: form-deficiente.php");
    exit();
    
} else {
    // Se não for POST, redireciona
    header("Location: form-deficiente.php");
    exit();
}