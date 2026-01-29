<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

require __DIR__.'/model/FormDeficienteModel.php';

require __DIR__.'/convert-pdf-deficiente.php';

use Model\FormDeficienteModel;
use ConvertPdf\CardDeficiente;

$formDeficienteModel = new FormDeficienteModel();

$inputGet = filter_input_array(INPUT_GET, FILTER_VALIDATE_INT);


try {
    $cardDeficiente = new CardDeficiente(
        $imagePath,
        [125, 51],
        [58, 70],
        [73, 141]
        );  
        
    $idBeneficiario = $inputGet['id-beneficiario'] ?? null;
    
    $beneficiario = $formDeficienteModel->detailsDeficiente($idBeneficiario);

    $regNumber = $beneficiario['numero_registro'] . "/" . date('Y');
    $issueDate = $beneficiario['data_emissao'];
    $nomeBeneficiario = $beneficiario['nome_beneficiario'];

    $cardDeficiente->addRegNumber($regNumber);

    $cardDeficiente->addExpirationDate($issueDate);
    
    $cardDeficiente->addName($nomeBeneficiario);

    $outputPath = __DIR__ . '/pdf-deficiente/cartao-deficiente-id='. $idBeneficiario .'.pdf';

    
    $cardDeficiente->outputCard($outputPath);
    
    } catch (\Exception $e) {
        echo "Erro ao gerar o PDF: " . $e->getMessage();
        exit;
        }

$fileName = $outputPath ? basename($outputPath) : '';
$type = 'deficiente';
?>
    
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <div class="flex gap-4 justify-between items-center">
        <h1 class="text-center text-4xl p-3">Impressão do cartão do deficiente</h1>
        <a class="flex justify-center text-white text-xl text-center m-7 bg-yellow-600 rounded-lg p-2 hover:bg-yellow-400 duration-75" href="imprimir-card-deficiente.php?id-beneficiario=<?= $idBeneficiario ?>">Voltar</a>
    </div>
    <iframe src="pdf-deficiente/<?=$fileName?>" width="100%" height="800px"></iframe>
    <a class="flex justify-center text-xl text-center m-7 hover:underline" href="pdf-deficiente/<?=$fileName?>" download>Clique aqui para baixar o arquivo</a>
</main>

<?php include __DIR__.'/layout/footer.php';?>

<script>
    window.addEventListener("beforeunload", () => {
        fetch("temp-cards.php?file=<?=urlencode($fileName)?>&type=<?=$type?>", {
            method: 'GET',
            keepalive: true
        }).catch(error => console.log("Erro ao limpar o arquivo", error));
    });
</script>