<?php foreach ($data as $newsItem): ?>
  <div id="news-<?= $newsItem['id_noticia'] ?>" tabindex="-1" aria-hidden="true" class="animate__animated animate__fadeInDown hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                  <?=htmlspecialchars($newsItem['titulo_principal']) ?>
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="news-<?= $newsItem['id_noticia'] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">

                <div>
                  <img src="https://w0.peakpx.com/wallpaper/250/796/HD-wallpaper-random-road-1-forest-grass-gray-travel-beautiful-sky-clouds-green-random-road-white.jpg" alt="imagem estática" class="w-full h-48 object-cover rounded-lg mb-4">
                </div>

                <h4 class="text-lg font-semibold text-gray-900"><?= htmlspecialchars($newsItem['subtitulo_principal']) ?></h4>
                
                <div>
                  <img src="https://w0.peakpx.com/wallpaper/250/796/HD-wallpaper-random-road-1-forest-grass-gray-travel-beautiful-sky-clouds-green-random-road-white.jpg" alt="imagem estática" class="w-full h-48 object-cover rounded-lg mb-4">
                </div>

                <h4 class="text-lg font-semibold text-gray-900">
                  <?= htmlspecialchars($newsItem['titulo_conteudo'])?>
                </h4>
                
                <h5 class="text-base font-normal text-gray-600">
                  <?= htmlspecialchars($newsItem['subtitulo_conteudo']) ?>
                </h5>

                <p class="text-base leading-relaxed text-gray-500">
                  <?= htmlspecialchars($newsItem['texto']) ?>
                </p>
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button data-modal-hide="news-<?= $newsItem['id_noticia'] ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">I accept</button>
                <button data-modal-hide="news-<?= $newsItem['id_noticia'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Decline</button>
            </div>
        </div>
    </div>
  </div>
<?php endforeach; ?>

<?php foreach ($data as $newsItem): ?>
  <div id="edit-news-<?= $newsItem['id_noticia']?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full animate__animated animate__fadeInDown">
      <div class="relative p-4 w-full max-w-2xl h-full">
          <div class="relative bg-white rounded-lg shadow-sm">
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Editar a notícia
                </h3>
                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center focus:outline-yellow-500" data-modal-hide="edit-news-<?= $newsItem['id_noticia']?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 md:p-5">
              <form class="space-y-4 p-5 grid grid-cols-1 gap-10" action="update-news.php" method="post">
                <input type="hidden" name="id-main-news" value="<?= $newsItem['id_noticia'] ?>">
                <input type="hidden" name="id-content-news" value="<?= $newsItem['id_conteudo'] ?>">

                <div class="relative z-0">
                    <input 
                      name="main-title"
                      type="text"
                      id="name"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                      value="<?= htmlspecialchars($newsItem['titulo_principal']) ?>"
                    />
                    <label
                      for="name"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o título da notícia
                    </label>
                  </div>

                  <div class="relative z-0">
                    <input 
                      name="main-subtitle"
                      type="text"
                      id="name"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                      value="<?= htmlspecialchars($newsItem['subtitulo_principal']) ?>"
                    />
                    <label
                      for="name"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o subtítulo da notícia
                    </label>
                  </div>

                  <div class="relative z-0">
                    <input 
                      name="title-content"
                      type="text"
                      id="name"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                      value="<?= htmlspecialchars($newsItem['titulo_conteudo']) ?>"
                    />
                    <label
                      for="name"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o título do conteúdo
                    </label>
                  </div>
                  
                  <div class="relative z-0">
                    <input 
                      name="subtitle-content"
                      type="text"
                      id="name"
                      class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                      placeholder=" "
                      value="<?= htmlspecialchars($newsItem['subtitulo_conteudo']) ?>"
                    />
                    <label
                      for="name"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o subtítulo do conteúdo
                    </label>
                  </div>
                  
                  <div class="relative z-0">
                    <textarea
                      name="text-content"
                      id="name"
                      class="block py-2.5 px-0 w-full h-100 text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                    >
                      <?= htmlspecialchars($newsItem['texto']) ?>
                    </textarea>
                    <label
                      for="name"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                      Digite o texto do conteúdo
                    </label>
                  </div>

                  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">
                    Salvar Alteração
                  </button>
              </form>
            </div>
          </div>
      </div>
  </div>
<?php endforeach; ?>