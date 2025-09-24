<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Cache 
ini_set('session.cache_limiter', 'public');
ini_set('session.cache_expire', 30);
session_cache_limiter(true);

error_reporting(E_ALL);
session_start();

$inputGet = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);

require __DIR__.'/model/FormDeficienteModel.php';

use Model\FormDeficienteModel;

$formDeficienteModel = new FormDeficienteModel();

$idBeneficiario = $inputGet['id-beneficiario'];

$beneficiarios = $formDeficienteModel->detailBeneficiario($idBeneficiario);

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php include __DIR__.'/layout/header.php';?>

<main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Cartão do Deficiente - Detalhes</h1>
    <div class="flex justify-center m-5">
        <a href="tab-deficiente.php" class="bg-yellow-400 rounded-xl p-2 text-2xl hover:bg-yellow-300 duration-150">Voltar</a>
    </div>
    <?php 
       include __DIR__.'/components/form-edit-beneficiario.php';
    ?>
</main>

<?php include __DIR__.'/layout/footer.php';?>