<?php 

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/./models/FormDeficiente.php';
use Models\FormDeficiente;

$rgBeneficiario = $_SESSION['dados_beneficiario_cancela'] ?? null;
$formDeficienteModel = new FormDeficiente();

$dadosBeneficiario = $formDeficienteModel->getDeficienteByRegNumber($rgBeneficiario);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados do Beneficiario</title>
  <?php include __DIR__.'/layout/head.php';?>
</head>

<body>
  <?php 
    include_once __DIR__.'/layout/header.php';
    include_once __DIR__.'/layout/title.php';
  ?>
  <div class="w-2xl flex justify-center items-center p-4">
    <a href="cancelar-cartao" class="p-2 rounded-lg bg-yellow-500 text-2xl hover:bg-yellow-200 duration-75">Voltar</a>
  </div>
  <?php
    include __DIR__.'/layout/dados-bene-cancela.php';
    include_once __DIR__.'/layout/footer.php';
  ?>