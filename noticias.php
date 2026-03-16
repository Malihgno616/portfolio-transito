<?php 
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require __DIR__.'/models/News.php';

use Models\News;

$news = new News();

$currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;

$limit = 6;

$offset = ($currentPage - 1) * $limit;

$todasNoticias = $news->paginatedNews($currentPage, $limit, $offset);

$totalNews = $news->countAllNews();
$totalPages = ceil($totalNews / $limit);
$page = $currentPage;

?>
<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <?php include 'layout/head.php';?>
    <title>Notícias</title>
  </head>

  <body>
    <?php
      include 'layout/header.php';
      include 'layout/allNews.php';
      include 'layout/footer.php';
    ?>