<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Impressão dos cartões</h1>
    <div class="flex gap-8 items-center justify-center w-full">
        <a href="#" class="w-[700px] h-[350px] bg-yellow-200 flex items-center justify-center border-4 rounded-md hover:bg-yellow-300 duration-75">
            <h1 class="text-2xl text-gray-800">Imprimir Frente</h1>
        </a>
        <a href="#" class="w-[700px] h-[350px] bg-yellow-200 flex items-center justify-center border-4 rounded-md hover:bg-yellow-300 duration-75">
            <h1 class="text-2xl text-gray-800">Imprimir Verso</h1>
        </a>
    </div>
</main>

<?php include __DIR__.'/layout/footer.php';?>