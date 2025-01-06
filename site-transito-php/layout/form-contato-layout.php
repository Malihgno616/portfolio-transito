  <div class="titulo">
    <h1>Contato</h1>
    <h2>Entre em contato conosco preenchendo o formulário abaixo</h2>
  </div>
  <section class="container animate__animated animate__fadeIn"> 
    <form action="../config/database/form-contato-db.php" method="post">
      <div class="single-input">
        <input type="text" name="nome" id="nome" required class="input">
        <label for="nome">Nome...</label>
      </div>
      <div class="single-input">
        <input type="email" name="email" id="email" required class="input">
        <label for="email">Email...</label>
      </div>
      <div class="single-input">
        <input type="text" name="telefone" id="telefone" required class="input">
        <label for="telefone">Telefone ou Celular...</label>
      </div>
      <div class="single-textarea">
        <textarea name="mensagem" id="mensagem" required class="textarea" class="textarea"></textarea>        
        <label for="mensagem">Digite sua mensagem...</label>
      </div>
      <div class="buttons">
        <button>Limpar <i class="fa-solid fa-broom"></i></button>
        <button type="submit">
          Enviar <i class="fas fa-paper-plane"></i>
        </button>
      </div>
    </form>
  </section>