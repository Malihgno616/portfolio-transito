<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('session.cache_limiter', 'public');
ini_set('session.cache_expire', 30);
session_cache_limiter(true);

error_reporting(E_ALL);
session_start();

require __DIR__.'/model/FormIdosoModel.php';

use Model\FormIdosoModel;

$inputGet = filter_input_array(INPUT_GET, FILTER_UNSAFE_RAW);

$idosoId = $inputGet['id-idoso'];

$formIdosoModel = new FormIdosoModel();

$idosos = $formIdosoModel->detailIdoso($idosoId);

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>
<main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Cartão do Idoso - Detalhes</h1>
    <div class="flex justify-center m-5">
        <a href="tab-idoso.php" class="bg-yellow-400 rounded-xl p-2 text-2xl hover:bg-yellow-300 duration-150">Voltar</a>
    </div>
    
    <?php 
        if (isset($_SESSION['idoso-alert'])) {
            echo $_SESSION['idoso-alert'];
            unset($_SESSION['idoso-alert']);
        }

        include __DIR__.'/components/form-idoso-edit.php';
    ?>
</main>

<?php include __DIR__.'/layout/footer.php';?>

