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
use Model\ContactModel\ContactModel;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$model = new ContactModel();
$data = $model->paginatedContacts($page, 15);

$contacts = $data['contacts'];
$totalPages = $data['totalPages'];
$currentPage = $data['page'];
$totalContacts = $data['total'];

$start = (($currentPage - 1) * 15) + 1;
$end = min($currentPage * 15, $totalContacts);

$order = $_GET['orderBy'] ?? "id";

$limit = 15;
$offset = ($currentPage - 1) * $limit;

switch ($order) {
    case 'id':
        $contacts = $model->orderById($limit, $offset);
        break;
    case 'name':
        $contacts = $model->orderByName($limit, $offset);
        break;
    case 'date':
        $contacts = $model->orderByDate($limit, $offset);
        break;  
    default:
        $contacts = $model->paginatedContacts($page, 15)['contacts'];
        break;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>

<main class="w-full h-full p-10">

    <div class="flex flex-col md:flex-row
            md:justify-between md:items-center
            w-full max-w-5xl mx-auto mb-5 gap-4">

        <h1 class="text-3xl md:text-5xl text-center md:text-left">
            Contatos
        </h1>

        <div class="flex items-center justify-center gap-3">

            <button
            data-modal-target="search-contact"
            data-modal-toggle="search-contact"
            class="text-white bg-yellow-700 hover:bg-yellow-800
                    focus:ring-4 focus:outline-none focus:ring-yellow-300
                    font-medium rounded-lg text-sm md:text-md
                    px-4 md:px-5 py-2.5
                    transition">
            <i class="fas fa-search"></i>
            </button>

            <a href="home.php"
            class="text-center text-base md:text-xl
                    px-4 py-2
                    rounded-xl bg-yellow-600 text-white
                    hover:bg-yellow-500 transition">
            Voltar
            </a>

        </div>
    </div>

    <hr>
    <br>
    <?php include __DIR__.'/components/table-contatos.php';?>
</main>

<?php 
include __DIR__.'/components/modal-contact.php';
include __DIR__.'/components/modal-pesquisa-contato.php';
?>
<script src="assets/js/search.js"></script>
<?php include __DIR__.'/layout/footer.php';?> 