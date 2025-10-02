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
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>

<main class="w-full h-full p-10">
  <?php include __DIR__.'/components/noticias.php';?>
  <div class="m-auto text-center p-12">
      <a href="home.php" class="text-3xl w-32 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
    </div>
</main>

<?php include __DIR__.'/layout/footer.php'; ?>