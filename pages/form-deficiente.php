<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário Deficiente</title>
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  <?php 
    // include_once('../layout/head-form-deficiente.php');
    include('../layout/head.php');
  ?>
</head>
<body>
  <?php 
    include('../layout/header.php');
    include_once('../layout/title.php');
    include('../layout/layout-form-deficiente.php');
    include('../layout/footer.php');
  ?>
