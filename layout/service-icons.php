<main class="m-5 flex flex-col justify-center items-center">
  <h1 class="p-5 text-3xl sm:text-4xl md:text-5xl text-center">
    Serviços Online
  </h1>
  <p class="p-5 text-xl sm:text-2xl text-center">
    Nesta página, oferecemos nossos serviços principais relacionados ao trânsito.
  </p>
  <div class="servicos animate__animated animate__fadeIn p-10 mx-auto">
    <!-- Utilizando grid responsivo com Tailwind -->
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
      <!-- Item de Serviço -->
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl text-black p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/multas.php">
          <div class="icones mb-2">
            <i class="fas fa-car text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Multas</span>
        </a>
      </li>

      <!-- Outros itens seguem o mesmo padrão -->
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/vagas-especiais.php">
          <div class="mb-2">
            <i class="fas fa-wheelchair text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Vagas Especiais</span>
        </a>
      </li>
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/sinalizacao.php">
          <div class="mb-2">
            <i class="fas fa-ban text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Sinalizações</span>
        </a>
      </li>
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/interdicoes.php">
          <div class="mb-2">
            <i class="fas fa-sign text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Interdições</span>
        </a>
      </li>
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/semaforos.php">
          <div class="mb-2">
            <i class="fas fa-traffic-light text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Semáforos</span>
        </a>
      </li>
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/lombadas.php">
          <div class="mb-2">
            <i class="fa-solid fa-mound text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Lombadas</span>
        </a>
      </li>
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/zona-azul.php">
          <div class="mb-2">
            <i class="fas fa-location-dot text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Zona-Azul</span>
        </a>
      </li>
      <li class="flex flex-col items-center border-2 border-black rounded-full p-4 hover:border-yellow-500 transition duration-300">
        <a class="text-base sm:text-xl p-4 flex flex-col items-center justify-center hover:text-gray-500 duration-200" href="../pages/bicicletas.php">
          <div class="mb-2">
            <i class="fas fa-bicycle text-3xl sm:text-4xl md:text-5xl"></i>
          </div>
          <span>Bicicletas</span>
        </a>
      </li>
    </ul>
  </div>
  <p class="text-center text-base sm:text-lg p-5">Caso surgir alguma dúvida, compareça presencialmente ou entre em contato preenchendo este formulário: <a class="hover:underline text-yellow-700" href="../pages/contato.php">Clique Aqui</a></p>
</main>
