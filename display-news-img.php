<?php
require __DIR__.'/models/News.php';

use Models\News;

if(isset($_GET['id']) && isset($_GET['type'])) {
    $id = (int)$_GET['id'];
    $type = $_GET['type'];
       
    $noticia = new News();
    $imgNoticiaArray = $noticia->detailedNews($id);
    
    // Pega o primeiro resultado do array
    if($imgNoticiaArray && count($imgNoticiaArray) > 0) {
        $imgNoticia = $imgNoticiaArray[0];
        
        switch($type) {
            case "main":
                if(!empty($imgNoticia['img_noticia'])){
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $mimeType = $finfo->buffer($imgNoticia['img_noticia']);
                    header("Content-Type: " . $mimeType);
                    echo $imgNoticia['img_noticia'];
                    exit;
                }
                break;

            case "content":
                if(!empty($imgNoticia['img_conteudo'])){
                    $finfo = new finfo(FILEINFO_MIME_TYPE);
                    $mimeType = $finfo->buffer($imgNoticia['img_conteudo']);
                    header("Content-Type: " . $mimeType);
                    echo $imgNoticia['img_conteudo'];
                    exit;
                }
                break;
        }
    }
} 

// Imagem padrão se houver erro
header("Content-Type: image/png");
echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mNkYPhfDwAChwGA60e6kgAAAABJRU5ErkJggg==');
exit;