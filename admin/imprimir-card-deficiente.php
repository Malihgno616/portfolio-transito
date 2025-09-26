<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$idBeneficiario = 1;
$nomeBeneficiario = "João da Silva";

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Impressão dos cartões</h1>
    <p class="font-bold text-2xl text-center m-7 text-yellow-700">
        ID: <?= $idBeneficiario; ?>
    </p>
    <p class="text-2xl text-center m-7">
        Nome: <?= $nomeBeneficiario; ?>
    </p>
    <div class="flex gap-8 justify-center flex-col items-center w-full">
        
        <form action="card-deficiente-frente.php" method="get" target="_blank">
            <button class="w-[600px] h-[350px] bg-gray-200 flex items-center justify-center rounded-md hover:bg-gray-300 duration-75">
                <h1 class="text-4xl text-gray-800 text-center">Imprimir Frente <i class="fa-solid fa-file-pdf"></i></h1>
            </button>
        </form>

        <form action="card-deficiente-verso.php" method="get" target="_blank">
            <button class="w-[600px] h-[350px] bg-gray-200 flex items-center justify-center rounded-md hover:bg-gray-300 duration-75">
                <h1 class="text-4xl text-gray-800 text-center">Imprimir Frente <i class="fa-solid fa-file-pdf"></i></h1>
            </button>
        </form>

        <a href="tab-deficiente.php" class="rounded-xl w-[400px] text-3xl flex justify-center m-auto items-center bg-yellow-600 text-white p-3 hover:bg-yellow-500 duration-75">Voltar</a>
    
    </div>
</main>

<?php include __DIR__.'/layout/footer.php';?>