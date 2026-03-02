<?php 
session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require_once __DIR__.'/model/TelaSiteModel.php';

use Model\TelaSiteModel;

$telaSiteModel = new TelaSiteModel();

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>

<main class="w-full h-full p-10">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center 
        max-w-4xl mx-auto mb-5 gap-4">

        <h1 class="text-3xl md:text-5xl text-center md:text-left">
        Telas do Site
        </h1>

        <a href="home.php"
            class="text-lg md:text-xl text-center px-6 py-3 rounded-lg 
                bg-yellow-600 text-white hover:bg-yellow-500 w-42 transition">
        Voltar
        </a>
    </div>
    <hr>
    <?php include __DIR__.'/components/table-telas.php';?>
</main>

<?php include __DIR__.'/layout/footer.php'; ?>