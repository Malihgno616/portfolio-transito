  <?php 
  $lista_endereco = [
    "Av. Joaquim Lopes Águila x Av Maria Augusta Thomaz",
    "Rua Rafael de Barros x Rua Newton Prado",
    "Rua Rafael de Barros x Rua Dr. Querubino Soeiro",
    "Rua Rafael de Barros x Bernardino de Campos",
    "Av. 29 de Agosto x Rua Dr. Querubino Soeiro",
    "Av. 29 de Agosto x Rua Antonio Mourão",
    "Av. 29 de Agosto x Rua João Pessoa",
    "Av. 29 de Agosto x Rua Newton Prado",
    "Av. 29 de Agosto x Praça Manoel Leme",
    "Rua Dr. Armando Sales de Oliveira x Rua João Pessoa",
    "Rua Dr. Armando Sales de Oliveira x Rua Antonio Mourão",
    "Rua Padre Julião x Rua João Pessoa",
    "Rua Padre Julião x Rua Newton Prado",
    "Av. Carlo Bonfanti x Av Visconde de Nova Granada",
    "Av. Carlo Bonfanti x Rua Mario Covas Junior",
    "Av. Carlo Bonfanti x Rua Prof. Domingos Cambiaghi",
    "Av. Carlo Bonfanti x Rua Maj. Arthur Franco Mourão",
    "Rua Manoel Leme x Rua Dr. Armando Sales de Oliveira",
    "Rua Newton Prado x Rua Dr. Armando Sales de Oliveira",
    "Rua Manoel Leme x Rua Padre Julião",
    "Rua João Arrais Seródio x Rua Padre Julião",
    "Av. Dr. Eurico Arrais Seródio x Av. Dr. Hermínio Ometto",
    "Rua Ângelo Consentino x Av. Dr. Hermínio Ometto",
    "Av. Sete de Setembro x Av. Joaquim Lopes Aguila",
    "Av. Dr. Hermínio Ometto (CMI/PEDESTRE)",
    "Av. Dr. Hermínio Ometto x Av. José Moreira de Queiroz",
    "Todos"
  ];
?>
  <main class="texto-format animate__animated animate__fadeIn mx-auto p-5 sm:p-10">
    <h1 class="text-4xl sm:text-5xl p-5">Semáforos</h1>
    <p class="text-justify text-lg sm:text-xl p-5">Aqui está a lista de todos os semáforos instalados em Leme/SP</p>

    <?php foreach($lista_endereco as $endereco):?>
    <p class="text-base sm:text-sm p-5 w-full sm:w-auto"><?= $endereco?></p>
    <?php endforeach;?>

  </main>