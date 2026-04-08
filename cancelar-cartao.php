<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cancelar Cartão</title>
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
  <?php include('layout/head.php');?>
</head>

<body>
  <?php 
    include_once("layout/header.php");
    include_once("layout/form-cancela.php");
    ?>
  <script src="assets/js/formatDoc.js"></script>
  <?php 
    include_once("layout/footer.php");
  ?>