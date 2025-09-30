<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

require __DIR__.'/model/FormIdosoModel.php';

require __DIR__.'/convert-pdf-idoso-frente.php';

use Model\FormIdosoModel;

use ConvertPdf\CardIdosoFrente;

$imagePath = __DIR__ . '/cartao-idoso/cartao-idoso-frente.png';

$formIdosoModel = new FormIdosoModel();

$inputGet = filter_input_array(INPUT_GET, FILTER_VALIDATE_INT);

$idIdoso = $inputGet['id-idoso'];

$numReg = $formIdosoModel->cardIdosoDetails($idIdoso)['numero_registro'];

$issueDate = $formIdosoModel->cardIdosoDetails($idIdoso)['data_emissao'];

$outputDir = __DIR__  .'/pdf-idoso-frente';

$outputPath = $outputDir . '/cartao-idoso-id' . $idIdoso . '-frente.pdf';

try {
    
    $pdfFrente = new CardIdosoFrente($imagePath, [497, 276], [310, 346]);
    
    $pdfFrente->addContentRegNumber($numReg . '/' . $year);
    
    $pdfFrente->addContentIssueDate($issueDate);
    
    $pdfFrente->generate($outputPath);
    
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
    <h1 class="text-center text-4xl p-3">Impressão do cartão do idoso frente</h1>
    <iframe src="pdf-idoso-frente/cartao-idoso-id<?=$idIdoso?>-frente.pdf" width="100%" height="600px"></iframe>
    <a class="flex justify-center text-xl text-center m-7 hover:underline" href="pdf-idoso-frente/cartao-idoso-id<?=$idIdoso?>-frente.pdf" download>Clique aqui para baixar o arquivo</a>
</main>

<?php include __DIR__.'/layout/footer.php';?>