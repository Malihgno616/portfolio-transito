<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Segunda via</title>
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  <?php include_once("layout/head.php")?>
</head>

<body>
  <?php 
    include_once("layout/header.php");
    include_once('layout/title.php');
    include_once("layout/form-2avia-furto-roubo.php");
    include_once("layout/footer.php");
  ?>