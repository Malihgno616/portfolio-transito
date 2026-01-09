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
    <div class="flex justify-between items-center w-[58em] m-auto mb-5">
        <h1 class="text-5xl font-light text-center mb-5">Cartão do Idoso</h1>
        <div class="flex items-center justify-center gap-3">
            <button data-modal-target="add-idoso-modal" data-modal-toggle="add-idoso-modal" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"><i class="fas fa-plus"></i></button>
            <button data-modal-target="search-idoso" data-modal-toggle="search-idoso" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                <i class="fas fa-search"></i>
            </button>
            <a href="servicos.php" class="text-center text-xl w-28 p-2 rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
        </div>
    </div>
    <hr>
    <div class="flex justify-center items-center mb-4 gap-10">
        <p class="text-md font-normal p-4 text-gray-500 dark:text-gray-400">
            Total de registros <span class="font-semibold text-gray-900"> <?= $formIdosoModel->idosoCountTable(); ?>
        </p>
        <p class="text-md font-normal p-4 text-gray dark:text-gray-400">
            Último cartão emitido <span class="font-semibold text-gray-900"> <?= $formIdosoModel->lastRegistrationNumber() ?> </span>
        </p> 
    </div>
    <br>
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
    
</main>

<?php include __DIR__.'/layout/footer.php';?>

