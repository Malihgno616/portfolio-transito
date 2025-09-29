<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

require __DIR__.'/model/FormDeficienteModel.php';

require __DIR__.'/convert-pdf-deficiente-verso.php';

use Model\FormDeficienteModel;

use ConvertPdf\CardDeficienteVerso;

$formDeficienteModel = new FormDeficienteModel();

$inputGet = filter_input_array(INPUT_GET, FILTER_VALIDATE_INT);

$idBeneficiario = $inputGet['id-beneficiario'];

error_reporting(E_ALL);

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

$imageDir = __DIR__.'/pdf-deficiente-verso';

$imagePath = __DIR__ . '/cartao-deficiente/cartao-deficiente-verso.png';

try {

    $pdfVerso = new CardDeficienteVerso($imagePath, [295,10]);

    $nomeBeneficiario = $formDeficienteModel->detailsDeficiente($idBeneficiario)['nome_beneficiario'];
       
    $pdfVerso->addContentNomeIdoso($nomeBeneficiario);
    
    $outputPath = $imageDir . '/cartao-deficiente-id' . $idBeneficiario . '-verso.pdf';

    $pdfVerso->generate($outputPath);

} catch(Exception $e) {
    echo "Erro ao gerar o PDF: " . $e->getMessage();
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <h1 class="text-center text-4xl p-3">Impressão do cartão do deficiente - verso</h1>
    <iframe src="pdf-deficiente-verso/cartao-deficiente-id<?=$idBeneficiario?>-verso.pdf" width="100%" height="600px"></iframe>
    <a class="flex justify-center text-xl text-center m-7 hover:underline" href="pdf-deficiente-verso/cartao-deficiente-id<?=$idBeneficiario?>-verso.pdf" download>Clique aqui para baixar o arquivo</a>
</main>

<?php include __DIR__.'/layout/footer.php';?>