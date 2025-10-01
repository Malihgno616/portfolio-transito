<?php 

require __DIR__.'/model/FormIdosoModel.php';

require __DIR__.'/convert-pdf-idoso-verso.php';

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

use ConvertPdf\CardIdosoVerso;

use Model\FormIdosoModel;

$inputGet = filter_input_array(INPUT_GET, FILTER_UNSAFE_RAW);

$imagePath = __DIR__ . '/cartao-idoso/cartao-idoso-verso.png';

$idIdoso = $inputGet['id-idoso'];

$formIdosoModel = new FormIdosoModel();

$outputDir = __DIR__  .'/pdf-idoso-verso';

$outputPath = $outputDir . '/cartao-idoso-id' . $idIdoso . '-verso.pdf';

try {
    $pdfVerso = new CardIdosoVerso($imagePath, [295,10]);

    $nomeIdoso = $formIdosoModel->cardIdosoDetails($idIdoso)['nome_idoso'];
    
    // Múltiplas tentativas de conversão
    $nomeCorrigido = $nomeIdoso;
    
    // Tentativa 1: Remover possíveis caracteres problemáticos
    $nomeCorrigido = preg_replace('/[^\x00-\x7F\x80-\xFF]/', '', $nomeCorrigido);
    
    // Tentativa 2: Converter para ISO-8859-1
    if (function_exists('iconv')) {
        $nomeCorrigido = iconv('UTF-8', 'ISO-8859-1//IGNORE', $nomeCorrigido);
    } else {
        $nomeCorrigido = mb_convert_encoding($nomeCorrigido, 'ISO-8859-1', 'UTF-8');
    }
    
    $pdfVerso->addContentNomeIdoso($nomeCorrigido);
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
    <h1 class="text-center text-4xl p-3">Impressão do cartão do idoso - Verso</h1>
    <iframe src="pdf-idoso-verso/cartao-idoso-id<?=$idIdoso?>-verso.pdf" width="100%" height="600px"></iframe>
    <a class="flex justify-center text-xl text-center m-7 hover:underline" href="pdf-idoso-verso/cartao-idoso-id<?=$idIdoso?>-verso.pdf" download>Clique aqui para baixar o arquivo</a>
</main>

<?php include __DIR__.'/layout/footer.php';?>