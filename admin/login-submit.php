<?php

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

session_regenerate_id(true);

include __DIR__.'/config/conn.php';
require __DIR__.'/config/env.php';

$conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//* $message = $conn->connect();
//* echo $message; Conectado com successo! ou Erro ao conectar!

$inputPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

function setError($message) {
  return $_SESSION['err-login'] = 
    <<<HTML
    <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
      <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
      </svg>
      <span class="sr-only">Info</span>
      <div class="ms-3 text-sm font-medium">
        $message
      </div>
      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
      </button>
    </div> 
  HTML;
}

try {
    $userLogin = $inputPost['user-login'];
    $password = $inputPost['password'];  

    if(empty($userLogin) || empty($password)) {
      setError("Preencha todos os campos");
      header("Location: login.php");
      exit();
    } 
    
    $pdo = $conn->connect();

    $query = "SELECT user_login, pass from login_adm WHERE user_login = :user_login";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_login', $userLogin);
    $executed = $stmt->execute();  
    
    if($stmt->rowCount() > 0) {

      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      if(password_verify(trim($password), trim($user['pass']))) {                
        $_SESSION['user-login'] = $user['user_login'];
        header("Location: home.php");
        exit();
      } else {
        setError("Usuário e/ou senha incorretos");
        header("Location: login.php");
        exit();
      }

    } else {
      setError("Usuário não encontrado");
      header("Location: login.php");
      exit();
    }

} catch(PDOException $e) {
  setError("Erro: " . $e->getMessage());
  header("Location: login.php");
  exit();
}

