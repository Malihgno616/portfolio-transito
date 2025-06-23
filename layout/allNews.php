<div class="shadow-lg bg-stone-500 bg-blend-multiply bg-[url(../assets/img/imgtransito.png)] p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8">
  <div class="p-10">
    <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Notícias Recentes</h1>
  </div>
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
    <?php if(!empty($news)): ?>
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
                  <div class="space-y-4">
                    <div class="space-y-2">
                        <a href="#" class="block overflow-hidden">
                          <img class="w-full h-48 object-cover p-2"
                          src="https://t3.ftcdn.net/jpg/00/81/26/82/360_F_81268225_eVHynMTlVQf3wVdYOoUEz8d8KolhVZm0.jpg"
                          alt="<?= htmlspecialchars($noticia['titulo_principal'] ?? "") ?>" />
                        </a>
                        <h2 class="text-3xl text-center font-normal text-gray-900">
                          <?= htmlspecialchars($noticia['titulo_principal'] ?? "") ?>
                        </h2>
                        <h3 class="text-2xl text-center font-normal text-gray-900">
                          <?= htmlspecialchars($noticia['subtitulo_principal'] ?? "") ?>
                        </h3>
                    </div>
                      <?php
                      $contents = obtainContentNews($noticia['id_noticia']);
                      
                      if($contents):
                        foreach($contents as $content):
                      ?>
                    <div class="space-y-2 p-2">
                      <?php if(!empty($content['titulo_conteudo'])): ?>
                        <h4 class="text-xl font-medium text-gray-700">
                          <?= htmlspecialchars($content['titulo_conteudo']) ?>
                        </h4>
                      <?php endif; ?>
                      
                      <?php if(!empty($content['subtitulo_conteudo'])): ?>
                        <h5 class="text-lg font-medium text-gray-600 mt-2">
                          <?= htmlspecialchars($content['subtitulo_conteudo']) ?>
                        </h5>
                      <?php endif; ?>
                      
                      <?php if(!empty($content['texto'])): ?>
                        <p class="text-base text-gray-500 mt-2">
                          <?= nl2br(htmlspecialchars($content['texto'])) ?>
                        </p>
                      <?php endif; ?>
                    </div>
                    <hr class="my-4">
                      <?php 
                        endforeach;
                      endif;
                      ?>
                    </div>
                  </div>
          </div>
      </div>
      <?php 
      endforeach; 
      endif;
      ?>         
    </div>
  </div>
  <nav aria-label="Page navigation example" class="mt-8">
    <ul class="flex gap-2 items-center justify-center -space-x-px h-10 text-base">
        <li>
            <a href="?page=<?= max(1, $page - 1) ?>" 
               class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-yellow-800 bg-white border-2 border-yellow-600 rounded-s-lg hover:bg-yellow-200 hover:text-yellow-700 duration-300 transition <?= $page <= 1 ? 'opacity-50 cursor-not-allowed' : '' ?>">
                <span class="sr-only">Anterior</span>
                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
            </a>
        </li>
        <?php 

        $startPage = max(1, $page - 2);
        $endPage = min($totalPages, $page + 2);

        if($startPage > 1) {
            echo '<li>
                <a href="?page=1" class="font-bold flex items-center justify-center px-4 h-10 leading-tight border-2 border-yellow-600 bg-white text-yellow-700 hover:bg-yellow-200 rounded-md">
                    1
                </a>
            </li>';
            if($startPage > 2) {
                echo '<li class="px-2 text-white">...</li>';
            }
        }
        
        for($x = $startPage; $x <= $endPage; $x++): ?>
            <li>
                <a href="?page=<?= $x ?>" 
                   class="<?= $x == $page ? 'bg-yellow-300 text-yellow-800 border-yellow-600' : 'bg-white text-yellow-700 border-yellow-600' ?> font-bold flex items-center justify-center px-4 h-10 leading-tight border-2 hover:bg-yellow-200 hover:text-yellow-700 duration-300 transition rounded-md">
                    <?= $x ?>
                </a>
            </li>
        <?php endfor; 

        if($endPage < $totalPages) {
            if($endPage < $totalPages - 1) {
                echo '<li class="px-2 text-white">...</li>';
            }
            echo '<li>
                <a href="?page='.$totalPages.'" class="font-bold flex items-center justify-center px-4 h-10 leading-tight border-2 border-yellow-600 bg-white text-yellow-700 hover:bg-yellow-200 rounded-md">
                    '.$totalPages.'
                </a>
            </li>';
        }
        ?>

        <li>
            <a href="?page=<?= min($totalPages, $page + 1) ?>" 
               class="flex items-center justify-center px-4 h-10 leading-tight text-yellow-800 bg-white border-2 border-yellow-600 rounded-e-lg hover:bg-yellow-200 hover:text-yellow-700 duration-300 transition <?= $page >= $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>">
                <span class="sr-only">Próxima</span>
                <svg class="w-3 h-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </a>
        </li>
    </ul>
  </nav>
  <?php if(!empty($noticia)): ?>
    <div class="col-span-3 text-center text-white py-10">
        <p>Total de notícias: <?= $totalNews ?></p>
        <p>Offset calculado: <?= $offset ?></p>
    </div>
  <?php endif; ?>
</div>
