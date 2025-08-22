<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require __DIR__.'/model/UsersModel.php';

use UsersModel\UsersModel\UsersModel;

$usersModel = new UsersModel();

$userId = filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT);

$inputPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

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

$options = [
  'cost' => 15
];

$userLogin = $inputPost['user-login'] ?? "";
$userName = $inputPost['user-name'] ?? "";
$accessLevel = $inputPost['access-level'] ?? "";
$pass = $inputPost['password'] ?? "";

// Só gera hash se a senha não estiver vazia
$hashedPass = !empty($pass) ? password_hash($pass, PASSWORD_BCRYPT, $options) : null;

$nameFileUser = $inputPost['name-img-file-user'] ?? "";
$imgFileUser = null;
$updateImage = false;

// Verifica se uma nova imagem foi enviada
if(isset($_FILES['img-file-user']) && $_FILES['img-file-user']['error'] === UPLOAD_ERR_OK) {
    $imgFileUser = file_get_contents($_FILES['img-file-user']['tmp_name']);
    $updateImage = true; // Flag indicando que a imagem deve ser atualizada

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES['img-file-user']['tmp_name']);
    
    if (!in_array($mime, ['image/jpeg', 'image/png'])) {
        $_SESSION['alert-user'] = setAlert("Tipo de arquivo inválido. Apenas JPEG e PNG são permitidos.", "error");
        header("Location: usuarios.php");
        exit();
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $updated = $usersModel->updateUser(
            $userId, 
            $userLogin, 
            $userName, 
            $hashedPass, 
            $accessLevel, 
            $imgFileUser, 
            $nameFileUser, 
            $updateImage
        );

        if($updated) {
            $_SESSION['alert-user'] = setAlert("Dados do usuário atualizado com sucesso!", "success");
            header("Location: usuarios.php");
            exit();
        } else {
            $_SESSION['alert-user'] = setAlert("Nenhum dado foi alterado!", "warning");
            header("Location: usuarios.php");
            exit();
        }

    } catch(Exception $e) {
        $_SESSION['alert-user'] = setAlert("Erro: " . $e->getMessage(), 'error');
        header("Location: usuarios.php");
        exit();
    }
}