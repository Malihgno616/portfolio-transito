<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$solicitacoesPrincipais = filter_input(INPUT_POST, 'solicitacao', FILTER_DEFAULT);
$motivosSegVia = filter_input(INPUT_POST, 'motivos', FILTER_DEFAULT);

if ($solicitacoesPrincipais !== null) {
  switch ($solicitacoesPrincipais) {
    case '1':
      header("Location: form-deficiente");
      exit();
    case '2':
      header("Location: renovar-cartao");
      exit();
    case '3':
      header("Location: cancelar-cartao");
      exit();
  }
}

if($motivosSegVia !== null) {
  switch ($motivosSegVia) {
    case '1':
      header("Location: perda-cartao");
      exit();
    case '2':
      header("Location: furto");
      exit();
    case '3':
      header("Location: roubo");
      exit();
    case '4':
      header("Location: dano");
      exit();
  }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cartão Deficiente</title>
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
  <?php include('layout/head.php'); ?>
</head>

<body>
  <?php 
    include('layout/header.php');
    include('layout/title.php');
    include('layout/cartao-deficiente.php');
    include('layout/footer.php');
  ?>
