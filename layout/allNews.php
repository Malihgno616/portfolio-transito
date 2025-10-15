<div class="shadow-lg bg-stone-500 bg-blend-multiply p-10 bg-no-repeat bg-cover bg-fixed px-4 md:px-6 lg:px-8" style="background-image: url('assets/img/imgtransito-compressed.jpg');">
  <div class="p-10">
    <h1 class="text-white text-center text-3xl md:text-4xl lg:text-5xl mb-4">Notícias Recentes</h1>
  </div>
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
    <?php if(!empty($todasNoticias)): ?>
      <?php foreach ($todasNoticias as $index => $noticia): ?>
      <div class="bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow rounded-md">
        <a href="#" class="block overflow-hidden">
          <img class="w-full h-48 object-cover rounded-t-md"
            src="display-news-img?id=<?= $noticia['id_noticia']?>&type=main" alt="Img conteúdo da notícia"
            alt="<?= htmlspecialchars($noticia['titulo_principal']) ?>" />
        </a>
        <div class="p-5">
          <h5 class="text-center mb-4 text-xl lg:text-2xl font-normal tracking-tight text-gray-900 line-clamp-2">
            <?= htmlspecialchars($noticia['titulo_principal']) ?>
          </h5>                  
          <h6 class="text-center mb-2 text-xl lg:text-2xl font-medium tracking-tight text-gray-800 line-clamp-2">
            <?= htmlspecialchars($noticia['subtitulo_principal']) ?>
          </h6>
          <form action="detalhe-noticia" method="get">
            <input type="hidden" name="id" value="<?=$noticia['id_noticia']?>">
            <button type="submit" class="w-40 text-center uppercase flex items-center justify-between m-auto font-bold text-black bg-yellow-500 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg text-sm px-5 py-2.5 cursor-pointer duration-75" >
              Ler mais
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </button>
          </form>
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

</div>
