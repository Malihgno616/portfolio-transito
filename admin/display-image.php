<?php
require __DIR__.'/model/NewsModel.php';

use Model\NewsModel\NewsModel;

$newsModel = new NewsModel();

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    
    if ($type === 'main') {
        // Buscar imagem principal da notícia
        $newsMain = $newsModel->getMainNews($id);
        if ($newsMain && $newsMain['img_noticia']) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($newsMain['img_noticia']);
            header("Content-Type: " . $mimeType);
            echo $newsMain['img_noticia'];
            exit;
        }
    } elseif ($type === 'content') {
        // Buscar imagem do conteúdo
        $newsContent = $newsModel->getContentNews($id);
        if ($newsContent && $newsContent['img_conteudo']) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($newsContent['img_conteudo']);
            header("Content-Type: " . $mimeType);
            echo $newsContent['img_conteudo'];
            exit;
        }
    }
}

// Imagem padrão se houver erro
header("Content-Type: image/png");
readfile(__DIR__.'/path/to/default-image.png');
exit;