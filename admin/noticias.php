<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

if(!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['username'])) {
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
  <h1 class="text-5xl font-light text-center mb-5">Notícias</h1>
  <div class="flex justify-center animate__animated animate__fadeIn">
    <div class="p-10 w-full">
      <div class="flex items-center justify-center flex-col gap-7">
          <a href="servicos.php" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/90 p-10 hover:shadow-xl duration-150">
            <i class="fa-solid fa-file-lines"></i>
            Notícias em Destaque
          </a>
          <a href="#" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/90 p-10 hover:shadow-xl duration-150">
            <i class="fa-solid fa-square-plus"></i>
            Adicionar notícias
          </a>
          <a href="#" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/90 p-10 hover:shadow-xl duration-150">
            <i class="fa-solid fa-magnifying-glass"></i>
            Pesquisar notícia
          </a>
          <a href="#" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/90 p-10 hover:shadow-xl duration-150">
            <i class="fa-solid fa-newspaper"></i>
            Todas as notícias
          </a>
          <a href="#" class="text-3xl m-auto text-center h-auto w-120 rounded-lg bg-gray-300/90 p-10 hover:shadow-xl duration-150">
            <i class="fa-solid fa-upload"></i>
            Notícias publicadas
          </a>
      </div>
    </div>
  </div>
</main>

<?php include __DIR__.'/layout/footer.php'; ?>