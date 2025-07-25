<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

require __DIR__.'/model/UsersModel.php';
use UsersModel\UsersModel\UsersModel;

$inputPostUsers = filter_input_array(INPUT_POST, FILTER_VALIDATE_INT);
$userId = $inputPostUsers['id-user'];

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

$reqMethod = $_SERVER['REQUEST_METHOD'];

if($reqMethod === 'POST') {

  if (!$userId) {
    $_SESSION['alert-user'] = setAlert("ID inválido!", 'error');
    header('Location: usuarios.php');
    exit();
  }

  try {
    
    $deleted = (new UsersModel())->deleteUser($userId);
    
    if ($deleted) {
      $_SESSION['alert-user'] = setAlert('Usuário excluído com sucesso!', 'success');
    } else {
      $_SESSION['alert-user'] = setAlert( 'Erro ao excluir o usuário!', 'error');
    }
  
  } catch(PDOException $e) {
    $_SESSION['alert-user'] = setAlert($e->getMessage(), 'error');
  } 
  
  header("Location: usuarios.php");
  exit();
}

