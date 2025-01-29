<?php
  function pagination() {
     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $solicitacao = isset($_GET['solicitacao']) ? $_GET['solicitacao'] : null;
      $motivos = isset($_GET['motivos']) ? $_GET['motivos'] : null;
      if ($solicitacao) {
        switch ($solicitacao) {
          case '1':
            header("Location: form-deficiente.php");
            exit; 
          case '2':
            header("Location: renovar-cartao.php");
            exit;
          case '3':
            header("Location: cancelar-cartao.php");
            exit;
          case '4':
            break; 
        }
        if ($motivos) {
          switch ($motivos) {
            case '1':
              header("Location: perda-cartao.php");
              exit;
            case '2':
              header("Location: furto.php");
              exit;
            case '3':
              header("Location: roubo.php");
              exit;
            case '4':
              header("Location: dano.php");
              exit;
          }
        }
      }
    }
  }    
?>

<div class="texto-format">
  <h1>Cartão deficiente</h1>
  <p>Siga as etapas para solicitar o cartão</p>
  <p>Assim que o cartão estiver pronto, será feito para agendamento da retirada do cartão</p>
</div>

<form action="<?= pagination(); ?>" method="get" class="solicitacoes animate__animated animate__fadeIn">
  <h2>Selecione o tipo de solicitação</h2>
  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao1" value="1">
    <label for="cartao1">Desejo fazer meu 1º cartão</label>
  </div>

  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao2" value="2">
    <label for="cartao2">Desejo renovar meu cartão</label>
  </div>

  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao3" value="3">
    <label for="cartao3">Desejo cancelar meu cartão</label>
  </div>

  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao4" value="4">
    <label for="cartao4">Preciso de 2ª via do cartão (Dentro do prazo de validade)</label> 
  </div>

  <div class="motivo">
    <label for="motivos">Motivo</label>
    <select name="motivos">
      <option value="">Selecione...</option>
      <option value="1">Perda</option>
      <option value="2">Furto</option>
      <option value="3">Roubo</option>
      <option value="4">Dano</option>
    </select>
  </div>

  <button type="submit">Próximo</button>
</form>

<script src="../assets/js/exibirSelect.js"></script>