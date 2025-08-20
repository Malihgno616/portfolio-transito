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

require __DIR__.'/model/NewsModel.php';

use Model\NewsModel\NewsModel;

$newsModel = new NewsModel();

function setAlert($message, $type = 'success') {
    $colorClass = $type === 'success' 
        ? 'text-green-800 bg-green-50' 
        : 'text-red-800 bg-red-50';
    
    return <<<HTML
    <div id="alert-3" class="flex items-center p-4 mb-4 rounded-lg $colorClass w-15" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-lg font-medium">
            $message 
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 hover:bg-opacity-80 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    HTML;  
}

$inputPost = filter_input_array(INPUT_POST, [
    'id-main-news' => FILTER_SANITIZE_NUMBER_INT, 
    'id-content-news' => FILTER_SANITIZE_NUMBER_INT, 
    'main-title' => FILTER_UNSAFE_RAW,
    'main-subtitle' => FILTER_UNSAFE_RAW,
    'title-content' => FILTER_UNSAFE_RAW,
    'subtitle-content' => FILTER_UNSAFE_RAW,
    'text-content' => FILTER_UNSAFE_RAW,
    'name-img-file-main' => FILTER_UNSAFE_RAW,
    'name-img-file-content' => FILTER_UNSAFE_RAW
]);

// Inicializar variáveis de arquivo como null
$fileMainNews = null;
$fileContentNews = null;
$nameImageMainNews = null;
$nameImageContent = null;
$updateMainImage = false; // Flag para indicar se há nova imagem principal
$updateContentImage = false; // Flag para indicar se há nova imagem de conteúdo

// Processar upload da imagem principal (se houver)
if (isset($_FILES['img-file-main']) && $_FILES['img-file-main']['error'] === UPLOAD_ERR_OK) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES['img-file-main']['tmp_name']);
    
    if (!in_array($mime, ['image/jpeg', 'image/png'])) {
        $_SESSION['news-alert'] = setAlert("Tipo de arquivo inválido para imagem principal. Apenas JPEG e PNG são permitidos.", "error");
        header('Location: news-table.php');
        exit;
    }
    
    $fileMainNews = file_get_contents($_FILES['img-file-main']['tmp_name']);
    $nameImageMainNews = $_FILES['img-file-main']['name'];
    $updateMainImage = true; // Há nova imagem principal
} else {
    // Se não houve upload, usar o nome existente do POST
    $nameImageMainNews = trim($inputPost['name-img-file-main']);
    // Não definir $fileMainNews para preservar a imagem existente no banco
}

// Processar upload da imagem de conteúdo (se houver)
if (isset($_FILES['img-file-content']) && $_FILES['img-file-content']['error'] === UPLOAD_ERR_OK) {
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES['img-file-content']['tmp_name']);
    
    if (!in_array($mime, ['image/jpeg', 'image/png'])) {
        $_SESSION['news-alert'] = setAlert("Tipo de arquivo inválido para imagem de conteúdo. Apenas JPEG e PNG são permitidos.", "error");
        header('Location: news-table.php');
        exit;
    }
    
    $fileContentNews = file_get_contents($_FILES['img-file-content']['tmp_name']);
    $nameImageContent = $_FILES['img-file-content']['name'];
    $updateContentImage = true; // Há nova imagem de conteúdo
} else {
    // Se não houve upload, usar o nome existente do POST
    $nameImageContent = trim($inputPost['name-img-file-content']);
    // Não definir $fileContentNews para preservar a imagem existente no banco
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!filter_var($inputPost['id-main-news'], FILTER_VALIDATE_INT, ['min_range' => 1]) || 
       !filter_var($inputPost['id-content-news'], FILTER_VALIDATE_INT, ['min_range' => 1])) {
        $_SESSION['news-alert'] = setAlert("ID da notícia ou conteúdo não fornecido ou inválido.", "error");
        header('Location: news-table.php');
        exit;
    }

    // Validação mais flexível - ajuste conforme suas necessidades
    if(empty($inputPost['main-title']) || 
       empty($inputPost['main-subtitle']) || 
       empty($inputPost['title-content']) || 
       empty($inputPost['text-content'])) {
        $_SESSION['news-alert'] = setAlert("Campos obrigatórios não preenchidos.", "error");
        header('Location: news-table.php');
        exit;
    }

    $idMainNews = (int)trim($inputPost['id-main-news']);
    $idContentNews = (int)trim($inputPost['id-content-news']);
    $mainTitle = trim($inputPost['main-title']);
    $mainSubtitle = trim($inputPost['main-subtitle']);
    $titleContent = trim($inputPost['title-content']);
    $subtitleContent = trim($inputPost['subtitle-content'] ?? '');
    $textContent = strip_tags(trim($inputPost['text-content']));

    try {
        $updated = $newsModel->updateNews(
            $idMainNews, 
            $idContentNews, 
            $mainTitle, 
            $mainSubtitle, 
            $titleContent, 
            $subtitleContent, 
            $textContent, 
            $fileMainNews, 
            $nameImageMainNews, 
            $updateMainImage, // Nova flag
            $fileContentNews, 
            $nameImageContent,
            $updateContentImage // Nova flag
        );

        if ($updated) {
            $_SESSION['news-alert'] = setAlert("Notícia atualizada com sucesso!", "success");
        } else {
            $_SESSION['news-alert'] = setAlert("Nenhuma alteração foi feita ou erro ao atualizar a notícia.", "error");
        }
    } catch (Exception $e) {
        $_SESSION['news-alert'] = setAlert("Erro ao atualizar a notícia: " . $e->getMessage(), "error");
    }

    header('Location: news-table.php');
    exit;
}