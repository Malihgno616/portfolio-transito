<div
  class="shadow-lg bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito.png)] p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8">
  <div class="p-10">
    <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Notícias Recentes</h1>
  </div>
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
    <?php foreach ($news as $noticia): ?>
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
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" 
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
