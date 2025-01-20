<div class="container">
  <form action="../pages/infos-adicionais" method="get">
    <h1>Informações do Médico</h1>
    <div class="input-group">
      <input type="text" name="nome-medico" id="" required>
      <label for="nome">Nome do médico </label>
    </div>
    <div class="input-group">
      <input type="text" name="registro-profissional">  
      <label for="registro">Registro profissional (CRM)</label>
    </div>
    <div class="input-group">
      <input type="text" name="telefone-medico">
      <label for="telefone">Telefone</label>
    </div>
    <div class="input-group">
      <input type="email" name="endereco-medico">
      <label for="">Local de atendimento (Rua, AV)</label>
    </div>
    <h1>Informações Médicas</h1>
    <p>O requerente possui deficiência <strong>AMBULATÓRIA</strong> causada por:</p>
    <div class="input-group">
      <input type="checkbox" name="deficiencia-fisica" id="">
      <label for="deficiencia-fisica">Deficiência física</label>
    </div>
    <div class="input-group">
      <input type="checkbox" name="membros-superiores" id="">
      <label for="membros-superiores">Membro(s) Superiore(s)</label>
    </div>
    <div class="input-group">
      <input type="checkbox" name="membros-inferiores" id="">
      <label for="membros-inferiores">Membro(s) Inferior(es)</label>
    </div>
    <div class="input-group">
      <input type="checkbox" name="cadeira-de-rodas" id="">
      <label for="cadeira-de-rodas">Utiliza cadeira de rodas</label>
    </div>
    <div class="input-group">
      <input type="checkbox" name="aparelhagem-ortopedica" id="">
      <label for="aparelhagem-ortopedica">Aparelhagem Ortopédica</label>
    </div>
    <div class="input-group">
      <input type="checkbox" name="protese" id="">
      <label for="protese">Prótese</label>
    </div>
    <div class="input-group">
      <input type="checkbox" name="incapacidade-mental" id="">
      <label for="incapacidade-mental">DEFICIÊNCIA AMBULATÓRIA AUTÔNOMA DECORRENTE DE INCAPACIDADE MENTAL</label>
    </div>    
    <div class="input-group">
      <input type="checkbox" name="dificuldade-locomocao" id="">
      <label for="dificuldade-locomocao">DIFICULDADE DE LOCOMOÇÃO COM ALTO GRAU DE COMPROMETIMENTO AMBULATÓRIO</label>
    </div>

    <p>Assinalar o tempo. Em sentido <strong>temporário</strong>, informar o período previsto de restrição médica. No mínimo 2 meses e no máximo 1 ano.</p>
    <p>Em sentido permanente, informar o período de início de validade do cartão, com prazo de (05) cinco anos.</p>

    <div class="input-group">
      <input type="radio" name="validade" id="temporaria">
      <label for="temporaria">Temporária</label>
    </div>

    <div class="input-group">
      <input type="radio" name="validade" id="permanente">
      <label for="permanente" >Permanente</label>
    </div>

    <div class="input-group">
      <input type="date" name="data-inicio" id="data-inicio" required>
      <label for="data-inicio" id="data-inicio">Data de início</label>
    </div>

    <div class="input-group">
      <input type="date" name="data-fim" id="data-fim" required>
      <label for="data-fim" id="data-fim">Data de fim</label>
    </div>

    <p>- Descrição e CID da lesão que justifique a incapacidade ou dificuldade ambular:</p>
    <textarea name="" id=""></textarea>

    <p>- Selecione a cópia digitalizada do atestado médico da pessoa portadora de deficiência física permanente por período de validade de (05) cinco anos ou para pessoa com dificuldade de locomoção temporária, por período de no mínimo (02) dois meses e no máximo (01) um ano.</p>

    <div class="input-group">
      <input type="file" name="documento" id="">
      <label for="documento">SELECIONE (PNG, JPG, PDF)</label>
      <label for="documento">Cópia digitalizada do atestado médico <strong>(OBRIGATÓRIO)</strong></label>
    </div>

    <button>
      Voltar
    </button>
    <button>
      Próximo
    </button>

    <script src="../assets/js/exibirData.js"></script>
  </form>  

</div>
