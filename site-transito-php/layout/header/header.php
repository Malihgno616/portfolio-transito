<?php 
  $data = date('D');
  $mes = date('M');
  $dia = date('d');
  $ano = date('Y');

  $semana = array(
    'Sun' => 'Domingo',
    'Mon' => 'Segunda-feira',
    'Tue' => 'Terça-feira',
    'Wed' => 'Quarta-feira',
    'Thu' => 'Quinta-feira',
    'Fri' => 'Sexta-feira',
    'Sat' => 'Sábado'
  );

  $mes_extenso = array(
    'Jan' => 'Janeiro',
    'Feb' => 'Fevereiro',
    'Mar' => 'Março',
    'Apr' => 'Abril',
    'May' => 'Maio',
    'Jun' => 'Junho',
    'Jul' => 'Julho',
    'Aug' => 'Agosto',
    'Sep' => 'Setembro',
    'Oct' => 'Outubro',
    'Nov' => 'Novembro',
    'Dec' => 'Dezembro'
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trânsito Leme</title>
  <link rel="stylesheet" href="../.././assets/css/global.css">
  <link rel="stylesheet" href="../.././assets/css/header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="imagem_de_fundo">
    <img src="../.././assets/img/file.jpeg" alt="Logo Transito">
    <div id="boas_vindas">
      <h1>Seja bem vindo</h1>
      <em>Horário de Atendimento: 8:00 às 16:00 de segunda à sexta.</em>
      <div>
        <em>
          <?=$semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}"?>
        </em>
        <em>Telefone (19)12345-1234</em>
      </div>
    </div>
  </div>
  <nav class="menu">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Contato</a></li>
      <li><a href="#">Serviços Online</a></li>
      <button><i class="fas fa-bars"></i></button>
    </ul>
  </nav>
 
