<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require __DIR__.'/model/FormIdosoModel.php';

use Model\FormIdosoModel;

// Obter página atual da URL, padrão é 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;

$formIdosoModel = new FormIdosoModel();
$idosos = $formIdosoModel->paginatedIdosos($page, $limit);

$totalIdosos = $idosos['total'];
$totalPages = $idosos['totalPages'];
$currentPage = $idosos['page'];
$listIdosos = $idosos['idosos'];

// Calcular offset para numeração
$offset = ($currentPage - 1) * $limit;

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Cartão do Idoso</h1>
    <?php include __DIR__.'/components/table-idoso.php';?>
</main>

<?php include __DIR__.'/layout/footer.php';?>

