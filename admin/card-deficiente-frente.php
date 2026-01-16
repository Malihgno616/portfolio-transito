<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

require __DIR__.'/model/FormDeficienteModel.php';

require __DIR__.'/convert-pdf-deficiente-frente.php';

use Model\FormDeficienteModel;

use ConvertPdf\CardDeficienteFrente;

$formDeficienteModel = new FormDeficienteModel();

$inputGet = filter_input_array(INPUT_GET, FILTER_VALIDATE_INT);

$date = date("d/m/Y");

$year = date('Y');

$idBeneficiario = $inputGet['id-beneficiario'];

error_reporting(E_ALL);

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

$imageDir = __DIR__.'/pdf-deficiente-frente';

$imagePath = __DIR__ . '/cartao-deficiente/cartao-deficiente-frente.png';

$fileName = 'cartao-deficiente-id' . $idBeneficiario . '-frente.pdf'; 

$outputPath = $imageDir . '/' . $fileName;

$type = "deficiente-frente";

try {

    $pdfFrente = new CardDeficienteFrente($imagePath, [125, 52], [58, 71]);

    $numReg = $formDeficienteModel->detailsDeficiente($idBeneficiario)['numero_registro'];

    $issueDate = $formDeficienteModel->detailsDeficiente($idBeneficiario)['data_emissao'];

    $pdfFrente->addContentRegNumber($numReg . '/' . $year);

    $pdfFrente->addContentIssueDate($issueDate);
   
    $nomeBeneficiario = $formDeficienteModel->detailsDeficiente($idBeneficiario)['nome_beneficiario'];

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
        <h1 class="text-center text-4xl p-3">Impressão do cartão do deficiente - frente</h1>
        <a href="imprimir-card-deficiente.php?id-beneficiario=<?= $idBeneficiario ?>" class="flex justify-center text-white text-xl text-center m-7 bg-yellow-600 rounded-lg p-2 hover:bg-yellow-400 duration-75">Voltar</a>
    </div>
    <iframe src="pdf-deficiente-frente/cartao-deficiente-id<?=$idBeneficiario?>-frente.pdf" width="100%" height="600px"></iframe>
    <a class="flex justify-center text-xl text-center m-7 hover:underline" href="pdf-deficiente-frente/cartao-deficiente-id<?=$idBeneficiario?>-frente.pdf" download>Clique aqui para baixar o arquivo</a>
</main>

<?php include __DIR__.'/layout/footer.php';?>

<script>
window.addEventListener("beforeunload", () => {
    fetch("temp-cards.php?file=<?= urlencode($fileName)?>&type=<?=$type?>",{
        method: 'GET',
        keepalive: true
    }).catch(error => console.log("Erro ao limpar o arquivo", error));
});
</script>