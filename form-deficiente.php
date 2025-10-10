<?php 
session_start();

$array_error = $_SESSION['error'] ?? null;
$error_form_def = $_SESSION['error-form-deficiente'] ?? null;
$old_form_deficiente = $_SESSION['old-form-def'] ?? null;

unset($_SESSION['success-form-deficiente'], $_SESSION['error-form-deficiente'], $_SESSION['error'], $_SESSION['old-form-def']);

$estados = array(
	'AC' => 'Acre',
	'AL' => 'Alagoas',
	'AP' => 'Amapá',
	'AM' => 'Amazonas',
	'BA' => 'Bahia',
	'CE' => 'Ceará',
	'DF' => 'Distrito Federal',
	'ES' => 'Espirito Santo',
	'GO' => 'Goiás',
	'MA' => 'Maranhão',
	'MS' => 'Mato Grosso do Sul',
	'MT' => 'Mato Grosso',
	'MG' => 'Minas Gerais',
	'PA' => 'Pará',
	'PB' => 'Paraíba',
	'PR' => 'Paraná',
	'PE' => 'Pernambuco',
	'PI' => 'Piauí',
	'RJ' => 'Rio de Janeiro',
	'RN' => 'Rio Grande do Norte',
	'RS' => 'Rio Grande do Sul',
	'RO' => 'Rondônia',
	'RR' => 'Roraima',
	'SC' => 'Santa Catarina',
	'SP' => 'São Paulo',
	'SE' => 'Sergipe',
	'TO' => 'Tocantins',
);

$array_generos = [
  "Masculino",
  "Feminino",
];

$deficiencias = [
  "Deficiência Física",
  "Membro(s) Superior(es)",
  "Membro(s) Inferior(es)",
  "Cadeira de Rodas",
  "Aparelhagem Ortopédica",
  "Prótese",
  "Incapacidade Mental",
  "Dificuldade de Locomoção"
];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário Deficiente</title>
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  <?php include('layout/head.php'); ?>
</head>

<body>
  <?php 
    include('layout/header.php');
    include_once('layout/title.php');
    include('layout/layout-form-deficiente.php');
    include('layout/footer.php');
  ?>