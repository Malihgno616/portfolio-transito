<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

require_once __DIR__ . "/models/News.php";

use Models\News;

$news = new News();

$term = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_SPECIAL_CHARS) ?? "";

$results = $news->searchNews($term);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transito Leme</title>
  <?php include("layout/head.php");?>
</head>

<body>
  <?php include_once('layout/header.php'); ?>  

  <main class="w-full h-full">
  <?php 
    include 'layout/resultado-pesquisa.php';
  ?>
  </main>

  <?php 
    include_once('layout/footer.php');
  ?>