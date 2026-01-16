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

$dadosIdoso = $formIdosoModel->cardIdosoDetails($idIdoso);

$numReg = $dadosIdoso['numero_registro'];

$issueDate = $dadosIdoso['data_emissao'];

$year = date('Y'); 

$outputDir = __DIR__ . '/pdf-idoso-frente';

$fileName = 'cartao-idoso-id' . $idIdoso . '-frente.pdf'; 

$outputPath = $outputDir . '/' . $fileName;

$type = "idoso-frente";

try {

    $pdfFrente = new CardIdosoFrente($imagePath, [125, 57], [78, 75]);

    $pdfFrente->addContentRegNumber($numReg . '/' . $year);

    $pdfFrente->addContentIssueDate($issueDate);

    $pdfFrente->generate($outputPath);

} catch(Exception $e) {

    echo "Erro ao gerar o PDF: " . $e->getMessage();

    exit;

}

$_SESSION['arquivos_temp_pdf'][] = $outputPath;

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <div class="flex gap-4 justify-between items-center">
        <h1 class="text-center text-4xl p-3">Impressão do cartão do idoso frente</h1>
        <a class="flex justify-center text-white text-xl text-center m-7 bg-yellow-600 rounded-lg p-2 hover:bg-yellow-400 duration-75" href="imprimir-card-idoso.php?id-idoso=<?= $idIdoso ?>">Voltar</a>
    </div>
    <iframe src="pdf-idoso-frente/<?=$fileName?>" width="100%" height="600px"></iframe>
    <a class="flex justify-center text-xl text-center m-7 hover:underline" href="pdf-idoso-frente/<?=$fileName?>" download>Clique aqui para baixar o arquivo</a>
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