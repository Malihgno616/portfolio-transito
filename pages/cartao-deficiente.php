<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST['solicitacao'])) {
  switch ($_POST['solicitacao']) {
    case '1':
      header("Location: ../pages/form-deficiente.php");
      exit();
    case '2':
      header("Location: ../pages/renovar-cartao.php");
      exit();
    case '3':
      header("Location: ../pages/cancelar-cartao.php");
      exit();
    case '4':
      echo "Solicitação 4 recebida";
      exit();
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartão Deficiente</title>
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  <!-- <?php  include('../layout/head-card-deficiente.php') ;?> -->
  <?php include('../layout/head.php'); ?>

</head>
<body>
  <?php 
    include('../layout/header.php');
    include('../layout/imgfundo.php');
    include('../layout/cartao-deficiente.php');
    include('../layout/footer.php');
  ?>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>