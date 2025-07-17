<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

if(!isset($_SESSION['redirect_url'])) {
    $_SESSION['redirect_url'] = 'home.php'; // Página padrão
}

if(isset($_SESSION['username'])) {
  header("Location: home.php");
} else {
  header("Location: login.php");
}
exit();


