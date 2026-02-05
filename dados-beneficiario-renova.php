<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__.'/./models/FormDeficiente.php';

use Models\FormDeficiente;

if (!isset($_SESSION['rg_beneficiario_renova']) ||empty($_SESSION['rg_beneficiario_renova'])) {
  header("Location: renovar-cartao.php");
  exit;
}

$rgBeneficiario = $_SESSION['rg_beneficiario_renova'];

$formDeficienteModel = new FormDeficiente();

$dadosBeneficiario = $formDeficienteModel->getDeficienteByRegNumber($rgBeneficiario);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados do Beneficiario</title>
  <?php include('layout/head.php');?>
</head>

<body>
  <?php 
    include_once('layout/header.php');
    include_once('layout/title.php');
    include('layout/dados-bene-renova.php'); 
    include_once('layout/footer.php');
  ?>