<?php 

session_start();

$error_data = isset($_SESSION['erro-dados-def-renova']) ? $_SESSION['erro-dados-def-renova'] : '';
unset($_SESSION['erro-dados-def-renova']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Renovar Cartão</title>
  <?php include_once('../layout/head.php');?>
</head>

<body>
  <?php 
    include_once("../layout/header.php");
    include_once('../layout/title.php');
    include_once("../layout/form-renova.php");
    include_once("../layout/footer.php");
  ?>