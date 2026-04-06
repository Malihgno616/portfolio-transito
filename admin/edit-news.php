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

$id = $_GET['id'];

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

            <a href="pesquisa-noticia.php" class="text-center text-xl w-2xl p-2 rounded-md bg-stone-600 text-white hover:bg-stone-500 duration-75">
                <abbr title="Pesquisar notícia">
                    <i class="fas fa-search"></i>
                </abbr>
            </a>

            <a href="news-table.php" class="text-center text-xl w-2xl p-2 rounded-md bg-gray-600 text-white hover:bg-gray-500 duration-75">
                <abbr title="Notícias publicadas">
                    <i class="fa-solid fa-newspaper"></i>
                </abbr>
            </a>

            <a href="form-add-news.php" class="text-center text-xl w-2xl p-2 rounded-md bg-green-600 text-white hover:bg-green-500 duration-75">
                <abbr title="Adicionar uma notícia">
                    <i class="fa-solid fa-plus"></i>
                </abbr>
            </a>

            <form action="feature-news.php" method="post">
                <input type="hidden" name="id" value="<?= $newsModel->getNewsById($id)['id'] ?>">

                <button type="submit" class="text-center text-xl w-2xl p-2 rounded-md <?= $newsModel->getNewsById($id)['destaque'] === intval(0) ? 'bg-blue-600 hover:bg-blue-500' : 'bg-blue-400 hover:bg-blue-300' ?> text-white duration-75">
                    <abbr title="<?= $newsModel->getNewsById($id)['destaque'] === intval(0) ? 'Destacar notícia' : 'Remover destaque' ?>">
                        <i class="fa-solid fa-star"></i>
                    </abbr>
                </button>
            </form>
            
            <a href="news-table.php" class="text-center text-xl w-28 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
            
        </div>
    </div>
    <hr>
    <br>
    <?php 
        if(isset($_SESSION['news-alert'])){
          echo $_SESSION['news-alert'];
          unset($_SESSION['news-alert']);
        }

        include __DIR__.'/components/edit-news.php';
    ?>
</main>
<script src="./assets/js/editNewsImg.js"></script>
<script src="./assets/js/quill.js"></script>
<?php include __DIR__.'/layout/footer.php'; ?>