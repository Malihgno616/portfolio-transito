<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <?php include __DIR__.'/components/head.php';?>
  </head>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>

  <main class="w-full h-full p-10">
    <div class="w-2xl gap-3 flex flex-col items-center m-auto">
      <h1 class="text-3xl text-center">Informações do beneficiário - Registre os dados</h1>
      <a href="tab-deficiente.php" class="text-center text-base md:text-xl px-4 py-2           rounded-xl bg-yellow-600 text-white hover:bg-yellow-500 transition">
        Voltar
      </a>
    </div>
    <?php include __DIR__.'/components/form-add-deficiente.php';?>
  </main>
  
<script src="assets/js/addImgBene.js"></script>
<script src="assets/js/addAtestado.js"></script>
<script src="assets/js/spinnerForms.js"></script>
<script src="assets/js/spinnerOn.js"></script>
<script src="assets/js/exibirDataBene.js"></script>
<?php include __DIR__.'/layout/footer.php'; ?>