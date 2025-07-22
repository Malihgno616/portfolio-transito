<?php 


session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

require __DIR__.'/model/ContactModel.php';

if(!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

use Model\ContactModel\ContactModel;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Paginação

$model = new ContactModel();
$data = $model->paginatedContacts($page, 15);

$contacts = $data['contacts'];
$totalPages = $data['totalPages'];
$currentPage = $data['page'];
$totalContacts = $data['total'];

$start = (($currentPage - 1) * 15) + 1;
$end = min($currentPage * 15, $totalContacts);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>

<main class="w-full h-full p-10">
  <h1 class="text-5xl font-light text-center mb-5">Contatos</h1>
  <div class="flex justify-center animate__animated animate__fadeIn">
    <div class="p-10 w-full">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
              <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">Nome</th>
                      <th scope="col" class="px-6 py-3">Email</th>
                      <th scope="col" class="px-6 py-3">Telefone</th>
                      <th scope="col" class="px-6 py-3">Mensagem</th>
                      <th scope="col" class="px-6 py-3">Ações</th> 
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($contacts as $contact): ?>
                  <tr class="bg-white border-b  hover:bg-gray-50">
                      <td class="px-6 py-4 font-bold text-lg"><?=$contact['nome']?></td>
                      <td class="px-6 py-4 text-lg"><?=$contact['email']?></td>
                      <td class="px-6 py-4 text-lg"><?=$contact['telefone']?></td>
                      <td class="px-6 py-4 max-w-xs">
                        <div class="line-clamp-1 text-lg text-gray-700" title="<?=htmlspecialchars($contact['mensagem'])?>">
                            <?=htmlspecialchars($contact['mensagem'])?>
                        </div>  
                      </td>
                      <td class="px-6 py-4 text-lg">
                        <button type="button" data-modal-target="modal-<?= $contact['id'] ?>" data-modal-toggle="modal-<?= $contact['id'] ?>" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200">Mensagem</button>
                        <button  class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-600 dark:text-yellow-500 hover:bg-yellow-200">Editar</button>
                        <button  class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">Excluir</button>
                      </td>
                    </tr>                    
                    <?php endforeach; ?>                   
                </tbody>
              
                <tfoot>
                    <tr class="bg-gray-50">
                        <td colspan="5" class="px-6 py-3">
                            <nav class="flex items-center justify-between pt-2" aria-label="Table navigation">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Mostrando <span class="font-semibold text-gray-900"><?= $start ?>-<?= $end ?></span> 
                                    de <span class="font-semibold text-gray-900"><?= $totalContacts ?></span>
                                </span>
                                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                    <li>
                                        <a href="?page=<?= max(1, $currentPage - 1) ?>" 
                                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 <?= $currentPage == 1 ? 'opacity-50 cursor-not-allowed' : '' ?>">
                                            Anterior
                                        </a>
                                    </li>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li>
                                            <a href="?page=<?= $i ?>" 
                                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 <?= $i == $currentPage ? 'text-yellow-600 bg-blue-50 hover:bg-yellow-100 hover:text-yellow-700' : '' ?>">
                                                <?= $i ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>

                                    <li>
                                        <a href="?page=<?= min($totalPages, $currentPage + 1) ?>" 
                                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 <?= $currentPage == $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>">
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
</main>

<?php foreach($contacts as $contact): ?>
<div id="modal-<?= $contact['id'] ?>" tabindex="-1" 
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[9999] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animate__animated animate__fadeInDown">

    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow-xl">

            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-light text-gray-900">
                    Mensagem de: <strong><?= htmlspecialchars($contact['nome']) ?></strong>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modal-<?= $contact['id'] ?>">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Fechar modal</span>
                </button>
            </div>

            <div class="p-4 md:p-5 space-y-4">
                <p class="text-lg text-justify text-gray-700">
                    <?= htmlspecialchars($contact['mensagem']) ?>
                </p>
            </div>

        </div>
    </div>
</div>
<?php endforeach; ?>

<?php include __DIR__.'/layout/footer.php';?> 