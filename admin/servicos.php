<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

if(!isset($_SESSION['user-login'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['user-login'])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>
  
<main class="w-full h-full p-10">
  <?php include __DIR__.'/components/servicos.php';?>
</main>

<?php include __DIR__.'/layout/footer.php'; ?>