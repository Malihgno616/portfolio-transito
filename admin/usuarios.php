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

if(!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

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
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
            <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">Nome</th>
                      <th scope="col" class="px-6 py-3">Login</th>
                      <th scope="col" class="px-6 py-3">Nível</th>
                      <th scope="col" class="px-6 py-3">Ações</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach($users as $user): ?>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-bold text-lg">
                      <?=$user['username']?>
                    </td>  
                    <td class="px-6 py-4 font-bold text-lg">
                      <?=$user['username']?>
                    </td>
                    <td class="px-6 py-4">
                      <?=$user['level']?>
                    </td>
                    <td class="px-6 py-4 flex gap-2 text-lg">
                      <button class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-600 dark:text-yellow-500 hover:bg-yellow-200">Editar</button>
                      <button onclick="window.confirm('Tem certeza que deseja cancelar?')" class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">Excluir</button>
                    </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr class="bg-gray">
                    <td colspan="5" class="px-6 py-3">
                        <nav class="flex items-center justify-between pt-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                Mostrando <span class="font-semibold text-gray-900"><?= $start ?>-<?= $end ?></span> de 
                                <span class="font-semibold text-gray-900"><?= $totalUsers ?></span>
                            </span>
                            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                <li>
                                    <a href="?page=<?= ($currentPage > 1) ? $currentPage - 1 : 1 ?>" 
                                      class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">
                                        Anterior
                                    </a>
                                </li>
                                
                                <?php 

                                $startPage = max(1, $currentPage - 2);
                                $endPage = min($totalPages, $currentPage + 2);
                                
                                for($x = $startPage; $x <= $endPage; $x++): ?>
                                    <li>
                                        <a href="?page=<?= $x ?>" 
                                          class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 <?= ($x == $currentPage) ? 'bg-blue-50 text-blue-600' : '' ?>">
                                            <?= $x ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                                
                                <li>
                                    <a href="?page=<?= ($currentPage < $totalPages) ? $currentPage + 1 : $totalPages ?>" 
                                      class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">
                                        Próxima
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </td> 
                </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </main>
  <?php 
    include __DIR__.'/layout/footer.php';
  ?>