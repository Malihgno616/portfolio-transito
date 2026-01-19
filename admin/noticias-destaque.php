<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

use Model\NewsModel\NewsModel;

require_once __DIR__.'/model/NewsModel.php';
$newsModel = new NewsModel();

header("Content-Type: text/html; charset=UTF-8");

$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = 5;
$offset = ($currentPage - 1) * $limit;

$totalFeaturedNews = $newsModel->countFeaturedNews();
$featuredNews = $newsModel->getFeaturedNews($currentPage, $limit, $offset);

$totalPages = ceil($totalFeaturedNews / $limit);
$startItem = $offset + 1;
$endItem = min($offset + $limit, $totalFeaturedNews);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>
    <main class="w-full h-full p-10">
        <div class="flex justify-between items-center mb-10">
            <h1 class="text-5xl font-light text-center">Notícias em Destaque</h1>
            <div class="w-2xl flex gap-2">
                <a href="form-add-news.php" class="text-center text-xl w-2xl p-2 rounded-xl bg-green-600 text-white hover:bg-green-500 duration-75">Adicionar uma notícia</a>
                <a href="news-table.php" class="text-center text-xl w-2xl p-2 rounded-xl bg-gray-600 text-white hover:bg-gray-500 duration-75">Notícias Publicadas</a>
                <a href="noticias.php" class="text-center text-xl w-28 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
            </div>
        </div>
        <hr>
        <br>
        <?php       
        include __DIR__.'/components/noticias-destaque.php';
        include __DIR__.'/components/modal-featured-news.php';
        ?>
    </main>

<script src="assets/js/imgNews.js"></script>
<script src="assets/js/modalEditImageNews.js"></script>
<?php include __DIR__.'/layout/footer.php'; ?>