<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

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
    <?php include __DIR__.'/components/table-deficiente.php';?>
</main>

<?php include __DIR__.'/layout/footer.php';?>

