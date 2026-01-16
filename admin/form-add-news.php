<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__.'/components/head.php';?>
</head>
<body>
  <?php include __DIR__.'/layout/header.php';?>
  <main class="max-w-5xl h-full p-10 m-auto">
    <?php 
        
    if(isset($_SESSION['news-alert'])){
      echo $_SESSION['news-alert'];
      unset($_SESSION['news-alert']);
    }
    
    include __DIR__.'/components/form-news.php';

    ?>
    <div class="m-auto text-center p-12">
      <a href="noticias.php" class="text-3xl w-32 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
    </div>
  </main>
  <script src="assets/js/imgNews.js"></script>
  <?php include __DIR__.'/layout/footer.php';?>