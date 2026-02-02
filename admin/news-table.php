<?php 

use Model\NewsModel\NewsModel;

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

header("Content-Type: text/html; charset=UTF-8");

require __DIR__.'/model/NewsModel.php';

$newsModel = new NewsModel();

// Obter página atual da URL (default = 1)
$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$limit = 5;
$offset = ($currentPage - 1) * $limit;

// Obter dados
$data = $newsModel->publishedNews($currentPage, $limit, $offset);
$totalNews = $newsModel->countAllNews();
$totalPages = ceil($totalNews / $limit);

// Calcular range de exibição
$startItem = $offset + 1;
$endItem = min($offset + $limit, $totalNews);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>
  <main class="w-full h-full p-10">   
    <h1 class="lg:text-5xl text-3xl font-light text-center mb-5">Notícias publicadas</h1>
    <div class="flex justify-between items-center mb-10">
      <a href="noticias.php" class="text-center text-xl w-28 p-2 m-auto rounded-md bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
    </div>
    <hr>
    <br>
    <?php 
        if(isset($_SESSION['news-alert'])){
          echo $_SESSION['news-alert'];
          unset($_SESSION['news-alert']);
        }

        include __DIR__.'/components/table-noticia.php';
        include __DIR__.'/components/modal-news.php';
    ?>
  </main>
  <script src="assets/js/imgNews.js"></script>
  <script src="assets/js/modalEditImageNews.js"></script>
<?php include __DIR__.'/layout/footer.php'; ?>