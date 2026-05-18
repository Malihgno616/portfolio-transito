<?php 

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/model/FormDeficienteModel.php';

use Model\FormDeficienteModel;
$formDeficienteModel = new FormDeficienteModel();

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$beneficiarios = $formDeficienteModel->getPaginatedBeneficiarios($page, $limit, $_GET['orderBy'] ?? 'id');

$totalBeneficiarios = $beneficiarios['total'];
$currentPage = $beneficiarios['page'];
$totalPages = $beneficiarios['totalPages'];
$listBeneficiarios = $beneficiarios['beneficiarios'];

$offset = ($currentPage - 1) * $limit;
$order = $_GET['orderBy'] ?? "id";

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include __DIR__.'/components/head.php';?>
  </head>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center w-full max-w-5xl mx-auto mb-5 gap-4">
        <h1 class="text-3xl md:text-5xl text-center md:text-left">Cartão do Deficiente</h1>
        <div class="flex items-center justify-center gap-3">
            
            <form action="del-all-deficiente.php" onsubmit="return window.confirm('Tem certeza que deseja remover todos os cartões do deficiente?')" method="post">
                <button type="submit" class="text-lg md:text-xl text-center px-6 py-3 rounded-lg bg-red-600 text-white hover:bg-red-500 transition">
                    <abbr title="Excluir todos os cartões do deficiente">
                        <i class="fas fa-trash"></i>
                    </abbr>
                </button>
            </form>
            
            <a href="form-add-deficiente.php" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                <i class="fas fa-plus"></i>
            </a>
            
            <button data-modal-target="search-deficiente" data-modal-toggle="search-deficiente" class="text-white bg-yellow-700 hover:bg-yellow-800
                    focus:ring-4 focus:outline-none focus:ring-yellow-300
                    font-medium rounded-lg text-sm md:text-md
                    px-4 md:px-5 py-2.5
                    transition">
                <i class="fas fa-search"></i>
            </button>

            <a href="servicos.php" class="text-center text-xl w-28 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
        </div>
    </div>
    <hr>
    <div class="flex justify-center">
        <p class="text-md font-normal p-4 text-gray-500 dark:text-gray-400">
            Total de registros <span class="font-semibold text-gray-900"> <?= $totalBeneficiarios; ?>
        </p>
        <p class="text-md font-normal p-4 text-gray dark:text-gray-400">
            Último cartão emitido <span class="font-semibold text-gray-900"> <?= $formDeficienteModel->lastRegistrationNumber() ?></span>
        </p>
    </div>
    <br>
    <?php

        if(isset($_SESSION['alert-beneficiario'])) {
            echo $_SESSION['alert-beneficiario'];
            unset($_SESSION['alert-beneficiario']);
        }

        include __DIR__.'/components/table-deficiente.php';
        include __DIR__.'/components/modal-cria-num-reg-deficiente.php';
        include __DIR__.'/components/modal-pesquisa-deficiente.php';
    ?>
</main>
<script src="assets/js/searchDeficiente.js"></script>
<?php include __DIR__.'/layout/footer.php';?>
