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
    <div class="flex justify-between items-center w-[58em] m-auto mb-5">
        <h1 class="text-5xl text-center">Notificações</h1>
        <a href="home.php" class="text-3xl text-center p-2 rounded-lg bg-yellow-600 text-white hover:bg-yellow-500 duration-75">Voltar</a>
    </div>
    <hr>
    <br>
    <?php include __DIR__.'/components/table-notificacoes.php';?>
</main>

<?php include __DIR__.'/layout/footer.php';?>