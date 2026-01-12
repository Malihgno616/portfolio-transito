<?php 

require __DIR__.'/model/FormIdosoModel.php';

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

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

use Model\FormIdosoModel;

$formIdosoModel = new FormIdosoModel();

$inputGet = filter_input_array(INPUT_GET, FILTER_VALIDATE_INT);

$idIdoso = $inputGet['id-idoso'];

$nomeBeneficiario = $formIdosoModel->cardIdosoDetails($idIdoso)['nome_idoso'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Impressão dos cartões</h1>
    <p class="font-bold text-2xl text-center m-7 text-yellow-700">
        ID: <?= $idIdoso; ?>
    </p>
    <p class="text-2xl text-center m-7">
        Nome: <?= $nomeBeneficiario; ?>
    </p>
        <div class="flex gap-8 justify-center flex-col items-center w-full">
        
        <form action="card-idoso-frente.php" method="get" target="_blank">
            <input type="hidden" name="id-idoso" value="<?= $idIdoso; ?>">
            <button class="w-[600px] h-[350px] bg-gray-200 flex items-center justify-center rounded-md hover:bg-gray-300 duration-75">
                <h1 class="text-4xl text-gray-800 text-center">Frente <i class="fa-solid fa-file-pdf"></i></h1>
            </button>
        </form>

        <form action="card-idoso-verso.php" method="get" target="_blank">
            <input type="hidden" name="id-idoso" value="<?= $idIdoso; ?>">
            <button class="w-[600px] h-[350px] bg-gray-200 flex items-center justify-center rounded-md hover:bg-gray-300 duration-75">
                <h1 class="text-4xl text-gray-800 text-center">Verso <i class="fa-solid fa-file-pdf"></i></h1>
            </button>
        </form>

        <a href="tab-idoso.php" class="rounded-xl w-[400px] text-3xl flex justify-center m-auto items-center bg-yellow-600 text-white p-3 hover:bg-yellow-500 duration-75">Voltar</a>
    
    </div>
</main>

<?php include __DIR__.'/layout/footer.php';?>