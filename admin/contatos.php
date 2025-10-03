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

// Paginação

$model = new ContactModel();
$data = $model->paginatedContacts($page, 15);

$contacts = $data['contacts'];
$totalPages = $data['totalPages'];
$currentPage = $data['page'];
$totalContacts = $data['total'];

$start = (($currentPage - 1) * 15) + 1;
$end = min($currentPage * 15, $totalContacts);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>

<main class="w-full h-full p-10">
  <?php include __DIR__.'/components/table-contatos.php';?>
</main>

<?php include __DIR__.'/components/modal-contact.php';?>

<?php include __DIR__.'/layout/footer.php';?> 