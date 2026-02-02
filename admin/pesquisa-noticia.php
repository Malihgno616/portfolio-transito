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
<?php 
include __DIR__.'/layout/header.php';
?>
<main class="w-full h-full p-10">
    <div class="p-10 w-full">
        <h1 class="text-5xl font-light text-center mb-5">Pesquisar Notícias</h1>
        <div class="flex items-center justify-center gap-3">
            <a href="noticias.php" class="text-center text-xl w-28 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
        </div>
    </div>
    <hr>
    <br>
    <?php 
    include __DIR__.'/components/pesquisa-noticia.php';
    ?>
    
</div>
</main>
<script src="./assets/js/searchNews.js"></script>
<?php include __DIR__.'/layout/footer.php'; ?>