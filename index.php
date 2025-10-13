<?php 
  session_start(); 
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  ini_set("display_startup_errors", 1);
  
  require __DIR__.'/models/News.php';
  
  use Models\News;

  $news = new News();

  $noticiasRecentes = $news->recentNews(3);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transito Leme</title>
  <?php include("layout/head.php");?>
</head>

<body class="bg-gray-100">
  <?php 
    include_once('layout/header.php');
    include_once('layout/slider.php'); 
    include_once('layout/title.php');
    include_once('layout/news.php');
    include_once('layout/servicos-destaque.php');
    include_once('layout/institucional.php');
    include_once('layout/footer.php');
  ?>