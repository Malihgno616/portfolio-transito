<div class="container">
  <div class="title">
    <h1>Cartão do Deficiente</h1>
    <h2>Siga as etapas para solicitar o cartão</h2>
    <p>Assim que o cartão estiver pronto, será feito contato para agendamento da retirada do cartão</p>
  </div>
  <form action="../config/database/2aVia-db.php" method="post" class="form">
      <div class="title">
        <h2>
          2ª via do cartão
        </h2>
        <p>  
          Preencha as informações abaixo para solicitar a 2ª via do seu cartão.
        </p>
      </div>
      <div class="input-group">
          <input type="text" name="rg-beneficiario" class="input" required>
          <label for="" class="label-input">RG do beneficiário</label>
      </div>
      <div class="buttons">
        <button onclick="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i> Voltar </button>
      <button type="submit">
        Enviar<i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
      </button>     
      </div>
  </form>
</div>
