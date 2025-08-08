<?php

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require __DIR__.'/model/NewsModel.php';

use Model\NewsModel\NewsModel;

$newsModel = new NewsModel();

$inputPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$mainTitle = $inputPost['title'];

$mainSubtitle = $inputPost['subtitle'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  $insertedId =  $newsModel->addMainNews($mainTitle, $mainSubtitle);

  $_SESSION['main-news-id'] = $insertedId;
  
  $mainNews = $newsModel->getMainNews($insertedId);

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__.'/components/head.php';?>
</head>
<body>
  <?php include __DIR__.'/layout/header.php';?>
  <main class="max-w-5xl h-full p-10 m-auto">
   <?php include __DIR__.'/components/form-content.php';?>      
  </main>
<?php include __DIR__.'/layout/footer.php';?>

