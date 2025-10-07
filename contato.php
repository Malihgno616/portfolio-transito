<?php
session_start(); 

$erro = $_SESSION['erro'] ?? null;
$erro_campo = $_SESSION['erro-campos'] ?? [];
$old = $_SESSION['old-contact'] ?? [];

unset($_SESSION['erro'], $_SESSION['erro-campos'], $_SESSION['old-contact']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include('layout/head.php');?>
  <title>Contato</title>
</head>

<body>
  <?php 
    include('layout/header.php');
    include_once('layout/title.php');
    include('layout/form-contato-layout.php');
    include('layout/footer.php'); 
  ?>