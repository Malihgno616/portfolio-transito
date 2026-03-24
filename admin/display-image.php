<?php
require __DIR__.'/model/NewsModel.php';

use Model\NewsModel\NewsModel;

$newsModel = new NewsModel();

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];
    
    if ($type === 'main') {
        $newsMain = $newsModel->getImageNews($id);
        if ($newsMain && $newsMain['img_noticia']) {
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($newsMain['img_noticia']);
            header("Content-Type: " . $mimeType);
            echo $newsMain['img_noticia'];
            exit;
        }
    } 
}

// Imagem padrão se houver erro
header("Content-Type: image/png");
readfile(__DIR__.'/path/to/default-image.png');
exit;