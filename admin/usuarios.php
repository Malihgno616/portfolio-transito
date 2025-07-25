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
        <?php 
        
        if(isset($_SESSION['alert-user'])){
          echo $_SESSION['alert-user'];
          unset($_SESSION['alert-user']);
        }
        
        ?>
        <div class="flex justify-center">
          <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="bg-yellow-100 font-semibold text-yellow-600 dark:text-yellow-800 hover:bg-yellow-200 flex justify-center items-center gap-1 m-5 rounded-xl p-2 duration-100">Adicionar Usuário <i class="fa-solid fa-user-plus"></i></button>
        </div>        
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
                      <?=$user['name_adm']?>
                    </td>  
                    <td class="px-6 py-4 font-bold text-lg">
                      <?=$user['username']?>
                    </td>
                    <td class="px-6 py-4">
                      <?=$user['level']?>
                    </td>
                    <td class="px-6 py-4 flex gap-2 text-lg">
                      <button type="button" data-modal-target="#" data-modal-toggle="#" class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-600 dark:text-yellow-500 hover:bg-yellow-200">Editar</button>
                      <form action="del-user.php" method="post">
                        <input class="hidden" type="hidden" name="id-user" value="<?= htmlspecialchars($user['id'] ?? '') ?>">
                        <button type="submit" onclick="window.confirm('Tem certeza que deseja excluir este usuário?')" class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">Excluir</button>
                      </form>
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

  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animate__animated animate__fadeInDown">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Adicionar um usuário
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center focus:outline-yellow-500" data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4 p-5 grid grid-cols-1 gap-10" action="add-user.php" method="post">      

                    <div class="relative z-0">
                      <input 
                        name="user-login"
                        type="text"
                        id="name"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                        placeholder=" "
                      />
                      <label
                        for="name"
                        class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                              peer-focus:start-0 peer-focus:text-yellow-500 
                              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                              peer-focus:scale-90 peer-focus:-translate-y-4">
                        Digite o nome de Login
                      </label>
                    </div>
                    
                    <div class="relative z-0">
                      <input 
                        name="user-name"
                        type="text"
                        id="name"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                        placeholder=" "
                      />
                      <label
                        for="name"
                        class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                              peer-focus:start-0 peer-focus:text-yellow-500 
                              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                              peer-focus:scale-90 peer-focus:-translate-y-4">
                        Digite o nome de usuário
                      </label>
                    </div>

                    <div class="relative z-0">
                      <input name="access-level" type="number" id="number-input" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" required value="1"/>
                      <label for="number-input" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                              peer-focus:start-0 peer-focus:text-yellow-500 
                              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                              peer-focus:scale-90 peer-focus:-translate-y-4">Nível de acesso:</label>
                    </div>
                    
                    <div class="relative z-0">
                      <input 
                        name="password"
                        type="password"
                        id="pass"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                        placeholder=" "
                      />
                      <label
                        
                        for="pass"
                        class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                              peer-focus:start-0 peer-focus:text-yellow-500 
                              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                              peer-focus:scale-90 peer-focus:-translate-y-4">
                        Digite a senha
                      </label>
                    </div>

                    <div class="relative z-0">
                      <input 
                        name="pass-again"
                        type="password"
                        id="pass-again"
                        class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                        placeholder=" "
                      />
                      <label
                        for="pass-again"
                        class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                              peer-focus:start-0 peer-focus:text-yellow-500 
                              peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                              peer-focus:scale-90 peer-focus:-translate-y-4">
                        Digite o senha novamente
                      </label>
                    </div>

                    <button type="submit" class="w-full text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      Cadastrar usuário
                    </button>
                </form>
              </div>
         </div>
      </div>
  </div> 

  <?php 
    include __DIR__.'/layout/footer.php';
  ?>