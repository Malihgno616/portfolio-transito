  <section class="container animate__animated animate__fadeIn">
    <h1>Contato</h1>
    <h3>Para entrar em contato, preencha este formulário</h3>
    <form action="../config/database/form-contato-db.php" method="post" class="formulario-contato">
      <div>
        <input type="text" name="nome" id="" required placeholder="Nome"> 
        <input type="email" name="email" id="" required placeholder="Email">
        <input type="text" name="telefone" id="" required placeholder="Telefone"> 
      </div>
      <textarea name="mensagem" id="" required placeholder="Mensagem"></textarea>
      <div class="btns">
        <button>Limpar <i class="fa-solid fa-xmark"></i></button>
        <button>Enviar <i class="fa-regular fa-paper-plane"></i></button>
      </div>
    </form>
  </section>