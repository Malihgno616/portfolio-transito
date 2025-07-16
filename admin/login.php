<?php 
session_start();

$errLogin = $_SESSION['err-login'] ?? "";

unset($_SESSION['err-login']);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php'; ?>
<body>
  <div class="bg-gray-500 bg-[url(assets/img/697.jpg)] h-screen bg-center bg-no-repeat bg-cover bg-blend-multiply">
    <?php require __DIR__.'/components/form-login.php';?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
