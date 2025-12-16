<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Cache 
ini_set('session.cache_limiter', 'public');
ini_set('session.cache_expire', 30);
session_cache_limiter(true);

error_reporting(E_ALL);
session_start();

require __DIR__.'/model/FormIdosoModel.php';

use Model\FormIdosoModel;

// Obter página atual da URL, padrão é 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$formIdosoModel = new FormIdosoModel();
$idosos = $formIdosoModel->paginatedIdosos($page, $limit);

$totalIdosos = $idosos['total'];
$totalPages = $idosos['totalPages'];
$currentPage = $idosos['page'];
$listIdosos = $idosos['idosos'];

// Calcular offset para numeração
$offset = ($currentPage - 1) * $limit;

$order = $_GET['orderBy'] ?? "id";

switch ($order) {
    case 'name':
        $listIdosos = $formIdosoModel->orderByName($limit, $offset);
        break;
    case 'reg':
        $listIdosos = $formIdosoModel->orderByRegNumber($limit, $offset);
        break;
    case 'id':
        $listIdosos = $formIdosoModel->orderById($limit, $offset);
        break;  
    default:
        $listIdosos = $formIdosoModel->paginatedIdosos($page, $limit)['idosos'];
        break;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Cartão do Idoso</h1>
    <div class="flex items-center justify-center">
        <button data-modal-target="add-idoso-modal" data-modal-toggle="add-idoso-modal" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Adicionar Idoso <i class="fas fa-plus"></i></button>
    </div>
    <?php 
        if (isset($_SESSION['idoso-alert'])) {
            echo $_SESSION['idoso-alert'];
            unset($_SESSION['idoso-alert']);
        }

        include __DIR__.'/components/modal-add-idoso.php';
        include __DIR__.'/components/modal-cria-num-reg-idoso.php';
        include __DIR__.'/components/modal-pesquisa-idoso.php';
        include __DIR__.'/components/table-idoso.php';
    ?>
    <div class="m-auto text-center p-12">
      <a href="servicos.php" class="text-3xl w-32 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
    </div>
</main>

<?php include __DIR__.'/layout/footer.php';?>

