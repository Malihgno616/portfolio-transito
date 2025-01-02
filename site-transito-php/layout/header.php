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
<div class="imagem_de_fundo">
  <img src="../assets/img/file.jpeg" alt="Logo Transito">
  <div id="boas_vindas">
    <h1>Seja bem vindo</h1>
    <em>Horário de Atendimento: 8:00 às 16:00 de segunda à sexta.</em>
    <div>
      <em>
        <?=$semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}"?>
      </em>
    </div>
  </div>
</div>
<nav class="menu">
  <ul> 
    <li><a href="../public/index.php">Home</a></li>
    <li><a href="../pages/servicos.php">Serviços Online</a></li>
    <li><a href="../pages/contato.php">Contato</a></li>
    <button>
    <i class="fas fa-bars"></i>
    </button>
  </ul>
</nav>
