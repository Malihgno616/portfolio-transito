<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados do Beneficiario</title>
  <?php include('layout/head.php');?>
</head>

<body>
  <?php 
    include_once('layout/header.php');
    include_once('layout/title.php');
    include('layout/dados-bene-renova.php'); 
    include_once('layout/footer.php');
  ?>