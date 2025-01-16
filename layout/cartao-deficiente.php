<div class="texto-format">
  <h1>Cartão deficiente</h1>
  <p>Siga as etapas para solicitar ocartão</p>
  <p>Assim que o cartão estiver pronto, será feito para agendamento da retirada do cartão</p>
</div>

<form action="" class="solicitacoes">
  <h2>Selecione o tipo de solicitação</h2>
  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao1">
    <label for="cartao1">Desejo fazer meu 1º cartão</label>
  </div>
  
  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao2">
    <label for="cartao2">Desejo renovar meu cartão</label>
  </div>
  
  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao3">
    <label for="cartao3">Desejo cancelar meu cartão</label>
  </div>
  
  <div class="radio-container">
    <input type="radio" name="solicitacao" id="cartao4">
    <label for="cartao4">Preciso de 2ª via do cartão (Dentro do prazo de validade)</label> 
  </div>

  <div class="motivo">
      <label for="motivos">Motivo</label>
      <select name="motivos" id="">
        <option value="">Selecione...</option>
        <option value="perda">Perda</option>
        <option value="">Furto</option>
        <option value="roubo">Roubo</option>
        <option value="danificado">Dano</option>
      </select>
  </div>

  <button>Próximo</button>

</form>

<script src="../assets/js/exibirSelect.js"></script>