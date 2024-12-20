<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transito Leme</title>
  <link rel="stylesheet" href="../assets/css/header.scss">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/footer.scss">
  <link rel="stylesheet" href="../assets/css/slide.css">
  <link rel="stylesheet" href="../assets/css/cards.css">
  <link rel="stylesheet" href="../assets/css/section.css">
  <link rel="stylesheet" href="../assets/css/links.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
  <?php 
    include_once('../layout/header.php');
    include_once('../layout/slider.php');  
  ?>
    <div class="container">
      <div class="card">
        <div class="card__header">
          <img src="https://source.unsplash.com/600x400/?computer" alt="card__image" class="card__image" width="600">
        </div>
        <div class="card__body">
          <span class="tag tag-blue">Technology</span>
          <h4>What's new in 2022 Tech</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
        </div>
        <div class="card__footer">
          <div class="user">
            <img src="https://i.pravatar.cc/40?img=1" alt="user__image" class="user__image">
            <div class="user__info">
              <h5>Jane Doe</h5>
              <small>2h ago</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card__header">
          <img src="https://source.unsplash.com/600x400/?food" alt="card__image" class="card__image" width="600">
        </div>
        <div class="card__body">
          <span class="tag tag-brown">Food</span>
          <h4>Delicious Food</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
        </div>
        <div class="card__footer">
          <div class="user">
            <img src="https://i.pravatar.cc/40?img=2" alt="user__image" class="user__image">
            <div class="user__info">
              <h5>Jony Doe</h5>
              <small>Yesterday</small>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card__header">
          <img src="https://source.unsplash.com/600x400/?car,automobile" alt="card__image" class="card__image" width="600">
        </div>
        <div class="card__body">
          <span class="tag tag-red">Automobile</span>
          <h4>Race to your heart content</h4>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi perferendis molestiae non nemo doloribus. Doloremque, nihil! At ea atque quidem!</p>
        </div>
        <div class="card__footer">
          <div class="user">
            <img src="https://i.pravatar.cc/40?img=3" alt="user__image" class="user__image">
            <div class="user__info">
              <h5>John Doe</h5>
              <small>2d ago</small>
            </div>
          </div>
        </div>
      </div>
      <div>
      <a href="#">Clique aqui para mais notícias</a>
      </div>
    </div>
    <section class="section">
        <h1>Oferecemos diversos meios de contato</h1>
        <a id="zapzap" href="#"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
        <a href="#"><i class="fas fa-envelope"></i> email@email.com</a>
        <a href="#"><i class="fas fa-phone"></i> (11) 1234-5678</a>
        <p>Caso necessário, poderá comparecer presencialmente na Coordenadoria de Trânsito para solicitar serviços e/ou afins.</p>
    </section>
    <section class="links">
      <h1>Links Úteis</h1>
      <ul>
        <li><a href="#">Prefeitura de Leme</a></li>
        <li><a href="#">Câmara Munipal de Leme</a></li>
        <li><a href="#">Detran-SP</a></li>
        <li><a href="#">Denatran</a></li>
        <li><a href="#">IPVA-SP</a></li>
        <li><a href="#">E-CNH</a></li>
        <li><a href="#">DER-SP</a></li>
      </ul>
    </section>
<?php include_once('../layout/footer.php');?>
<script src="../assets/js/slide.js"></script>
</body>
</html>