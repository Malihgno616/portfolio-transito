<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

header("Content-Type: text/html; charset=UTF-8");

require_once __DIR__.'/model/NewsModel.php';

use Model\NewsModel\NewsModel;

$newsModel = new NewsModel();

$idNews = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$idContentNewsFromURL = filter_input(INPUT_GET, 'id-content', FILTER_SANITIZE_NUMBER_INT);

if(!$idNews){
    header("Location: pesquisa-noticia.php");
    exit;
}

$mainNewsData = $newsModel->getMainNews($idNews);
$contentNewsData = $newsModel->getContentNews($idContentNewsFromURL);

// echo <<<HTML
// <p class="text-red-600 text-xl">
//     ID recebido - Notícia principal: $idNews
//     <br>
//     ID recebido - Conteúdo da notícia: $idContentNewsFromURL
// </p>
// HTML;

// var_dump($mainNewsData);
// var_dump($contentNewsData);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>
<main class="w-full h-full p-10">
    <div class="flex justify-between items-center w-[58em] m-auto mb-5">
        <h1 class="text-5xl font-light text-center mb-5">Detalhes da notícias</h1>
        <div class="flex items-center justify-center gap-3">
            <a href="pesquisa-noticia.php" class="text-center text-xl w-28 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
        </div>
    </div>
    <hr>
    <br>
    <?php include __DIR__.'/components/edit-news.php';?>
</main>
<?php include __DIR__.'/layout/footer.php'; ?>