<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <?php include '../layout/head.php';?>
    <title>Notícias</title>
  </head>

  <body>
    <?php
      include '../layout/header.php';
      include '../layout/title.php';
      include '../layout/allNews.php';
      include '../layout/footer.php';
    ?>