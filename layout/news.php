<div class="shadow-lg bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito.png)] p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8">
  <div class="p-10">
    <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Notícias Recentes</h1>
  </div>
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
    <?php foreach ($news as $index => $noticia): ?>
    <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow rounded-md">
      <a href="#" class="block overflow-hidden">
        <img class="w-full h-48 object-cover rounded-t-md"
          src="https://t3.ftcdn.net/jpg/00/81/26/82/360_F_81268225_eVHynMTlVQf3wVdYOoUEz8d8KolhVZm0.jpg"
          alt="<?= htmlspecialchars($noticia['titulo_principal']) ?>" />
      </a>
      <div class="p-5">
        <h5 class="text-center mb-4 text-xl lg:text-2xl font-normal tracking-tight text-gray-900 line-clamp-2">
          <?= htmlspecialchars($noticia['titulo_principal']) ?>
        </h5>                  
        <h6 class="text-center mb-2 text-xl lg:text-2xl font-medium tracking-tight text-gray-800 line-clamp-2">
          <?= htmlspecialchars($noticia['subtitulo_principal']) ?>
        </h6>
        <p class="text-justify mb-2 text-xl lg:text-md font-medium tracking-tight text-gray-600 line-clamp-3">
          <?= htmlspecialchars($noticia['texto'] ?? "")?>
        </p>
        <button data-modal-target="modal-<?= $index ?>" data-modal-toggle="modal-<?= $index ?>" 
        class="uppercase flex items-center m-auto font-bold text-black bg-yellow-500 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer duration-75" type="button">
          Ler mais
          <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 5h12m0 0L9 1m4 4L9 9" />
          </svg>
        </button>
      </div>
    </div>
    <!-- Main modal -->
    <div id="modal-<?= $index ?>" tabindex="-1" aria-hidden="true" class="animate__animated animate__fadeInDown hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative p-4 w-full max-w-xl max-h-full">
              <!-- Modal content -->
              <div class="relative bg-white rounded-lg shadow-sm">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                      <h2 class="text-2xl text-center font-semibold text-gray-900">
                          Detalhes da Notícia
                      </h2>
                      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modal-<?= $index ?>">
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                          </svg>
                          <span class="sr-only">Close modal</span>
                      </button>
                  </div>
                  <!-- Modal body -->
                  <div class="p-4 md:p-5 space-y-4">
                    <a href="#" class="block overflow-hidden">
                      <img class="w-full h-48 object-cover"
                      src="https://t3.ftcdn.net/jpg/00/81/26/82/360_F_81268225_eVHynMTlVQf3wVdYOoUEz8d8KolhVZm0.jpg"
                      alt="<?= htmlspecialchars($noticia['titulo_principal']) ?>" />
                    </a>
                    <h2 class="text-3xl text-center font-normal text-gray-900">
                      <?= htmlspecialchars($noticia['titulo_principal']) ?>
                    </h2>
                    <h3 class="text-2xl text-center font-normal text-gray-900">
                      <?= htmlspecialchars($noticia['subtitulo_principal']) ?>
                    </h3>
                    <h4 class="text-xl text-center font-medium text-gray-700">
                      <?= htmlspecialchars($noticia['titulo_conteudo'] ?? "") ?>
                    </h4>
                    <h4 class="text-xl text-center font-medium text-gray-700">
                      <?= htmlspecialchars($noticia['subtitulo_conteudo'] ?? "") ?>
                    </h4>
                    <p class="text-base text-justify leading-relaxed text-gray-500">
                      <?= htmlspecialchars($noticia['texto'] ?? "")?>
                    </p>
                  </div>
              </div>
          </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
  <a href="../pages/noticias.php"
    class="uppercase w-40 m-auto mt-10 flex items-center justify-center px-3 py-2 text-sm font-bold text-center text-black bg-yellow-500 rounded-lg hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-yellow-400 duration-75">
    Saiba mais 
    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
      fill="none" viewBox="0 0 14 10">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M1 5h12m0 0L9 1m4 4L9 9" />
    </svg>
  </a>
</div>