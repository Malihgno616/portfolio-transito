<?php 

use Model\NewsModel\NewsModel;

require __DIR__.'/model/NewsModel.php';

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

$newsModel = new NewsModel();

$inputPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!isset($inputPost['news_id'])) {
        die("ID da notícia principal não encontrado!");
    }
    
    $newsId = (int)$inputPost['news_id'];
    $titleContent = $inputPost['title-content'];
    $subtitleContent = $inputPost['subtitle-content'];
    $textContent = $inputPost['text-content'];
    
    // Verifique se os IDs são válidos
    error_log("Tentando adicionar conteúdo para newsId: $newsId");
    
    $contentId = $newsModel->addContentNews($titleContent, $subtitleContent, $textContent);
    
    if(!$contentId) {
        die("Falha ao adicionar conteúdo!");
    }
    
    error_log("Conteúdo criado com ID: $contentId, tentando relacionar com notícia $newsId");
    
    if($newsModel->updateRelationalNews($newsId, $contentId)) {
        unset($_SESSION['main-news-id']);
        header("Location: noticias.php");
        exit();
    } else {
        error_log("Falha no updateRelationalNews. newsId: $newsId, contentId: $contentId");
        die("Erro ao relacionar notícia com conteúdo!");
    }
}