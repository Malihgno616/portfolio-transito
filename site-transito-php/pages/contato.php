<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/header.scss">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/footer.scss">
  <link rel="stylesheet" href="../assets/css/formcontato.scss">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <title>Contato</title>
</head>
<body>
  <?php 
    include('../layout/header.php');
  ?>
  <section class="container animate__animated animate__fadeIn">
    <h1>Contato</h1>
    <h3>Para entrar em contato, preencha este formulário</h3>
    <form action="" method="post" class="formulario-contato">
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
  <?php 
    include('../layout/footer.php'); 
  ?>
</body>
</html>