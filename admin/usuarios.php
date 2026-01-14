<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require __DIR__.'/model/UsersModel.php';

use UsersModel\UsersModel\UsersModel;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$data = (new UsersModel())->allUsers($page, $limit);
$users = $data['users'];
$totalUsers = $data['totalUsers'];
$totalPages = $data['totalPages'];
$currentPage = $data['currentPage'];

$start = (($currentPage - 1) * $limit) + 1;
$end = min($currentPage * $limit, $totalUsers);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require __DIR__.'/components/head.php';?>
</head>
<body>
  <?php 
    include __DIR__.'/layout/header.php';  
  ?>  
  <main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Usuários</h1>
    <div class="flex justify-center animate__animated animate__fadeIn">
      <div class="p-10 w-full">
        <?php 
        
        if(isset($_SESSION['alert-user'])){
          echo $_SESSION['alert-user'];
          unset($_SESSION['alert-user']);
        }
        
        include __DIR__.'/components/table-usuarios.php';

        ?>
    </div>
    <div class="m-auto text-center p-12">
      <a href="home.php" class="text-3xl w-32 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
    </div>
  
    <?php include __DIR__.'/components/modal-usuarios.php';?>
    <script src="assets/js/addUserImage.js"></script>
    <script src="assets/js/editUserImage.js"></script>
  <?php 
    include __DIR__.'/layout/footer.php';
  ?>