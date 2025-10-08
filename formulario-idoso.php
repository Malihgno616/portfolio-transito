<?php
session_start(); 

$array_error = $_SESSION['err-fields'] ?? null;
$error_sql = isset($_SESSION['error-sql']) ?: null;
$old_form_idoso = $_SESSION['old-form-idoso'] ?? null;

unset($_SESSION['erro-form-idoso'], $_SESSION['err-fields'], $_SESSION['error-sql'], $_SESSION['old-form-idoso']);

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

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Idoso</title>
  <?php include_once('layout/head.php');?>
</head>

<body>
  <?php 
    include_once('layout/header.php');
    include_once('layout/title.php');
    include_once('layout/form-idoso-layout.php');
    include_once('layout/footer.php');
  ?>