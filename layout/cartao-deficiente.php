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

<div class="flex flex-col justify-center items-center m-20 gap-3">
  <h1 class="text-5xl md:text-2xl font-bold text-center">Cartão deficiente</h1>
  <p class="text-lg md:text-md text-justify">Siga as etapas para solicitar o cartão</p>
  <p class="text-lg md:text-md text-justify">Assim que o cartão estiver pronto, será feito para agendamento da retirada do cartão</p>
</div>

<form action="<?= pagination(); ?>" method="get" class="space-y-6 animate__animated animate__fadeIn mt-8 mb-8 w-100 m-auto p-10 rounded-lg shadow-md">
  <h2 class="text-xl font-semibold">Selecione o tipo de solicitação</h2>

  <div class="space-y-4">
    <div class="flex items-center">
      <input id="cartao1" type="radio" name="solicitacao" value="1" class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500">
      <label for="cartao1" class="ml-2 text-md font-medium text-gray-900">Desejo fazer meu 1º cartão</label>
    </div>

    <div class="flex items-center">
      <input id="cartao2" type="radio" name="solicitacao" value="2" class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500">
      <label for="cartao2" class="ml-2 text-md font-medium text-gray-900">Desejo renovar meu cartão</label>
    </div>

    <div class="flex items-center">
      <input id="cartao3" type="radio" name="solicitacao" value="3" class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500">
      <label for="cartao3" class="ml-2 text-md font-medium text-gray-900">Desejo cancelar meu cartão</label>
    </div>

    <div class="flex items-center">
      <input id="cartao4" type="radio" name="solicitacao" value="4" class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500">
      <label for="cartao4" class="ml-2 text-md font-medium text-gray-900">Preciso de 2ª via do cartão (Dentro do prazo de validade)</label>
    </div>
  </div>

  <div class="mt-6">
    <label for="motivos" class="block mb-2 text-md font-medium text-gray-900">Motivo</label>
    <select id="motivos" name="motivos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5">
      <option value="">Selecione...</option>
      <option value="1">Perda</option>
      <option value="2">Furto</option>
      <option value="3">Roubo</option>
      <option value="4">Dano</option>
    </select>
  </div>

  <button type="submit" class="text-white bg-yellow-500 hover:bg-yellow-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center duration-200">
    Próximo
  </button>
</form>

<script src="../assets/js/exibirSelect.js"></script>