<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/header.scss">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/footer.scss">
  <link rel="stylesheet" href="../assets/css/servicos.scss">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <title>Serviços Online</title>
</head>
<body>
  <?php 
    include_once('../layout/header.php');
  ?>
  <main class="container">
    <h1>
      Serviços Online
    </h1>
    <p>
      Nesta página, oferecemos nossos serviços principais relacionados ao trânsito.
    </p>
    <div class="servicos animate__animated animate__fadeIn">
      <ul>
        <li>
          <a href="#">
            <div class="icones">
              <i class="fas fa-car"></i>
            </div>
          </a>
          <span>Multas</span>
        </li>
        <li>
          <a href="#">
            <div class="icones">
              <i class="fas fa-wheelchair"></i>
            </div>
          </a>
          <span>Vagas Especiais</span>
        </li>
        <li>
          <a href="#">
            <div class="icones">
              <i class="fas fa-ban"></i>
            </div>
          </a>
          <span>Sinalizações</span>
        </li>
        <li>
          <a href="#">
            <div class="icones">
              <i class="fas fa-sign"></i>
            </div>
          </a>
          <span>Interdições</span>
        </li>
        <li>
          <a href="#">
            <div class="icones">
              <i class="fas fa-traffic-light"></i>
            </div>
          </a>
          <span>Semáforos</span>
        </li>
        <li>
          <a href="#">
            <div class="icones">
              <img src="../assets/img/lombada.png" alt="Lombada img">
            </div>
          </a>
          <span>Lombadas</span>
        </li>
        <li>
          <a href="#">
            <div class="icones">
              <i class="fas fa-location-dot"></i>
            </div>
          </a>
          <span>Zona-Azul</span>
        </li>
        <li>
          <a href="#">
            <div class="icones">
              <i class="fas fa-bicycle"></i>
            </div>
          </a>
          <span>Bicicletas</span>
        </li>
      </ul>
    </div>
    <p style="margin-top: 2rem;">Caso surgir alguma dúvida, compareça presencialmente ou entre em contato preenchendo este formulário: <a href="../pages/contato.php">Clique Aqui</a></p>
  </main>
  <?php 
    include_once('../layout/footer.php');
  ?>
</body>
</html>