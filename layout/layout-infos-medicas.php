<div class="container">

  <form class="form" action="../pages/infos-adicionais.php" method="get">
    <h1>Informações do Médico</h1>
    <div class="input-group">
      <input type="text" name="nome-medico" id="" required class="input">
      <label for="nome" class="label-input">Nome do médico </label>
    </div>
    <div class="input-group">
      <input type="text" name="registro-profissional" required class="input">  
      <label for="registro" class="label-input" >Registro profissional (CRM)</label>
    </div>
    <div class="input-group">
      <input type="text" name="telefone-medico" class="input" required>
      <label for="telefone" class="label-input">Telefone</label>
    </div>
    <div class="input-group">
      <input type="email" name="endereco-medico"  class="input" required>
      <label for="" class="label-input">Local de atendimento (Rua, AV)</label>
    </div>
    <h1>Informações Médicas</h1>
    <p>O requerente possui deficiência <strong>AMBULATÓRIA</strong> causada por:</p>
    <div class="input-group">
      <input type="checkbox" class="input-checkbox" name="deficiencia-fisica" id="">
      <label for="deficiencia-fisica">Deficiência física</label>
    </div>
    <div class="input-group">
      <input type="checkbox"  class="input-checkbox"  name="membros-superiores" id="">
      <label for="membros-superiores">Membro(s) Superiore(s)</label>
    </div>
    <div class="input-group">
      <input type="checkbox" class="input-checkbox"  name="membros-inferiores" id="">
      <label for="membros-inferiores">Membro(s) Inferior(es)</label>
    </div>
    <div class="input-group">
      <input type="checkbox" class="input-checkbox"  name="cadeira-de-rodas" id="">
      <label for="cadeira-de-rodas">Utiliza cadeira de rodas</label>
    </div>
    <div class="input-group">
      <input type="checkbox" class="input-checkbox"  name="aparelhagem-ortopedica" id="">
      <label for="aparelhagem-ortopedica">Aparelhagem Ortopédica</label>
    </div>
    <div class="input-group">
      <input type="checkbox" class="input-checkbox"  name="protese" id="">
      <label for="protese">Prótese</label>
    </div>
    <div class="input-group">
      <input type="checkbox" class="input-checkbox"  name="incapacidade-mental" id="">
      <label for="incapacidade-mental">DEFICIÊNCIA AMBULATÓRIA AUTÔNOMA DECORRENTE DE INCAPACIDADE MENTAL</label>
    </div>    
    <div class="input-group">
      <input type="checkbox" class="input-checkbox"  name="dificuldade-locomocao" id="">
      <label for="dificuldade-locomocao">DIFICULDADE DE LOCOMOÇÃO COM ALTO GRAU DE COMPROMETIMENTO AMBULATÓRIO</label>
    </div>

    <p>Assinalar o tempo. Em sentido <strong>temporário</strong>, informar o período previsto de restrição médica. No mínimo 2 meses e no máximo 1 ano.</p>
    <p>Em sentido permanente, informar o período de início de validade do cartão, com prazo de (05) cinco anos.</p>

    <div class="input-group">
      <input type="radio" class="input-radio" name="validade" id="temporaria">
      <label for="temporaria">Temporária</label>
    </div>

    <div class="input-group">
      <input type="radio" class="input-radio" name="validade" id="permanente" >
      <label for="permanente" >Permanente</label>
    </div>

    <div class="input-group">
      <input type="date" name="data-inicio" id="data-inicio" required class="input-date">
      <label for="data-inicio" id="data-inicio" class="label-input">Data de início</label>
    </div>

    <div class="input-group">
      <input type="date" name="data-fim" id="data-fim" class="input-date" required>
      <label for="data-fim" id="data-fim" class="label-input">Data de fim</label>
    </div>

    <div class="input-group">
      <textarea name="" id="" class="textarea"></textarea>
      <label for="cid" class="label">- Descrição e CID da lesão que justifique a incapacidade ou dificuldade ambular:</label>
    </div>

    <p>- Selecione a cópia digitalizada do atestado médico da pessoa portadora de deficiência física permanente por período de validade de (05) cinco anos ou para pessoa com dificuldade de locomoção temporária, por período de no mínimo (02) dois meses e no máximo (01) um ano.</p>

    <div class="input-group">
      <input type="file" name="documento" id="" class="input-file">
      <label for="documento">SELECIONE (PNG, JPG, PDF)Cópia digitalizada do atestado médico <strong>(OBRIGATÓRIO)</strong></label>
     
    </div>

    <button>
      Voltar
    </button>
    <button type="submit">
      Enviar
    </button>

    <script src="../assets/js/exibirData.js"></script>
    
  </form>  

</div>
