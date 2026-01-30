<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__.'/model/NotificacaoModel.php';
use Model\NotificacaoModel;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$limit = 15;

$notificacoes = new NotificacaoModel();
$notificacoes = $notificacoes->paginatedNotifications($page, $limit);

$totalNotficacoes =  $notificacoes['total'];
$totalPages = $notificacoes['totalPages'];
$currentPage = $notificacoes['page'];
$listNotificacoes = $notificacoes['notificacoes'];

$offset = ($currentPage - 1) * $limit;

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <div class="flex flex-col md:flex-row 
            md:justify-between md:items-center 
            w-full max-w-5xl mx-auto mb-5 gap-4">

        <h1 class="text-3xl md:text-5xl text-center md:text-left">
            Notificações
        </h1>

        <a href="home.php"
            class="text-lg md:text-xl text-center px-6 py-3 rounded-lg 
                    bg-yellow-600 text-white hover:bg-yellow-500 transition">
            Voltar
        </a>
    </div>

    <hr>
    <br>
    <?php include __DIR__.'/components/table-notificacoes.php';?>
</main>

<?php include __DIR__.'/layout/footer.php';?>