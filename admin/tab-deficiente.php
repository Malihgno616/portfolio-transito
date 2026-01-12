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

$beneficiarios = $formDeficienteModel->paginatedDeficientes($page, $limit);

$totalBeneficiarios = $beneficiarios['total'];
$totalPages = $beneficiarios['totalPages'];
$currentPage = $beneficiarios['page'];
$listBeneficiarios = $beneficiarios['deficientes'];

$offset = ($currentPage - 1) * $limit;

$order = $_GET['orderBy'] ?? "id";

switch ($order) {
    case 'id':
        $listBeneficiarios = $formDeficienteModel->orderById($limit, $offset);
        break;
    case 'name':
        $listBeneficiarios = $formDeficienteModel->orderByName($limit, $offset);
        break;
    case 'reg':
        $listBeneficiarios = $formDeficienteModel->orderByRegNumber($limit, $offset);
        break;
    default:
        $listBeneficiarios = $formDeficienteModel->paginatedDeficientes($page, $limit)['deficientes'];
        break;        
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <div class="flex justify-between items-center w-[58em] m-auto mb-5">
        <h1 class="text-5xl font-light text-center mb-5">Cartão do Deficiente</h1>
        <div class="flex items-center justify-center gap-3">
            <button data-modal-target="add-beneficiario-modal" data-modal-toggle="add-beneficiario-modal" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"><i class="fas fa-plus"></i>
            </button>
            <button data-modal-target="search-deficiente" data-modal-toggle="search-deficiente" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
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
        include __DIR__.'/components/modal-add-beneficiario.php';
        include __DIR__.'/components/modal-pesquisa-deficiente.php';
    ?>
</main>

<?php include __DIR__.'/layout/footer.php';?>

