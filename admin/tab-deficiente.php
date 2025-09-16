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

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    
    <h1 class="text-5xl font-light text-center mb-5">Cartão do Deficiente</h1>

    <div class="flex items-center justify-center">
        <button data-modal-target="add-beneficiario-modal" data-modal-toggle="add-beneficiario-modal" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Adicionar Beneficiário <i class="fas fa-plus"></i></button>
    </div>

    <?php

        if(isset($_SESSION['alert-beneficiario'])) {
            echo $_SESSION['alert-beneficiario'];
            unset($_SESSION['alert-beneficiario']);
        }
    
        include __DIR__.'/components/table-deficiente.php';
        include __DIR__.'/components/modal-add-beneficiario.php';
        include __DIR__.'/components/modal-edit-beneficiario.php';
    ?>
</main>

<?php include __DIR__.'/layout/footer.php';?>

