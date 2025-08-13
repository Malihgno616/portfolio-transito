<?php
require __DIR__.'/model/NewsModel.php';

use Model\NewsModel\NewsModel;

$newsModel = new NewsModel();

if (isset($_GET['id'])) {
    $news = $newsModel->getMainNews($_GET['id']);
    if ($news && $news['img_noticia']) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->buffer($news['img_noticia']);
        header("Content-Type: " . $mimeType);
        echo $news['img_noticia'];
        exit;
    }
}

// Imagem padrão se houver erro
header("Content-Type: image/png");
readfile(__DIR__.'/path/to/default-image.png');