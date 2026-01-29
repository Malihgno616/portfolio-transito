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

require __DIR__.'/convert-pdf-idoso.php';

use Model\FormIdosoModel;

use ConvertPdf\CardIdoso;

$imagePath = __DIR__ . '/cartao-idoso/Cartão-Idoso-A4.png';

$formIdosoModel = new FormIdosoModel();

$inputGet = filter_input_array(INPUT_GET, FILTER_VALIDATE_INT);

$idIdoso = $inputGet['id-idoso'];

$regNumber = $formIdosoModel->cardIdosoDetails($idIdoso)['numero_registro'] . "/" . date('Y');

$issueDate = $formIdosoModel->cardIdosoDetails($idIdoso)['data_emissao'];

$nomeIdoso = $formIdosoModel->cardIdosoDetails($idIdoso)['nome_idoso'];

try {
    $cardIdoso = new CardIdoso(
        $imagePath,
        [125, 56],
        [78, 74],
        [73, 141]
    );  

    $cardIdoso->addRegNumber($regNumber);
    $cardIdoso->addExpirationDate($issueDate);
    $cardIdoso->addName($nomeIdoso);

    $outputPath = __DIR__ . '/pdf-idoso/cartao-idoso-id='. $idIdoso .'.pdf';
    $cardIdoso->generate($outputPath);

} catch (\Exception $e) {
    echo "Erro ao gerar o PDF: " . $e->getMessage();
    exit;
}

$fileName = $outputPath ? basename($outputPath) : '';
$type = 'idoso';

?>
    
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <div class="flex gap-4 justify-between items-center">
        <h1 class="text-center text-4xl p-3">Impressão do cartão do idoso</h1>
        <a class="flex justify-center text-white text-xl text-center m-7 bg-yellow-600 rounded-lg p-2 hover:bg-yellow-400 duration-75" href="imprimir-card-idoso.php?id-idoso=<?= $idIdoso ?>">Voltar</a>
    </div>
    <iframe src="pdf-idoso/<?=$fileName?>" width="100%" height="800px"></iframe>
    <a class="flex justify-center text-xl text-center m-7 hover:underline" href="pdf-idoso/<?=$fileName?>" download>Clique aqui para baixar o arquivo</a>
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