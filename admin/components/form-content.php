 <h1 class="text-5xl font-light text-center mb-5">Título principal</h1>
    <div class="p-10 w-full">
      <form action="add-all-news.php" method="post" enctype="multipart/form-data" class="space-y-4 p-5 grid grid-cols-1 gap-10">
          <input type="hidden" name="news_id" value="<?= $_SESSION['main-news-id'] ?>">
          
          <div class="relative z-0">
            <input class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
            placeholder=" " type="text" name="title" value="<?= htmlspecialchars($inputPost['title'] ?? '') ?>">
            <label class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
            peer-focus:start-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0  peer-focus:scale-90 peer-focus:-translate-y-4" for="title">Título da notícia</label>
          </div>

          <div class="relative z-0">
            <div class="flex items-center justify-center w-full">
              <label for="dropzone-file-main-news" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <div id="image-preview" class="mt-4 flex justify-center">
                      <?php if(isset($mainNews) && $mainNews['img_noticia']): ?>
                        <div class="mb-6 w-full">
                          <h2 class="text-xl font-bold mb-2 text-center">Pré-visualização da Imagem Principal</h2>
                          <div class="flex justify-center">
                            <img src="display-image.php?id=<?= $mainNews['id_noticia'] ?>&type=main" 
                                alt="<?= htmlspecialchars($mainNews['nome_img_noticia']) ?>"
                                class="max-w-full max-h-40 object-contain rounded-lg shadow-md">
                          </div>
                        </div>
                      <?php else: ?>
                        <div class="mb-6 text-center">
                          <h2 class="text-xl font-bold mb-2">Pré-visualização da Imagem</h2>
                          <p class="text-gray-500">Nenhuma imagem selecionada.</p>
                          <svg class="w-8 h-8 mb-4 text-gray-500 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                          </svg>
                          <p class="mb-2 text-lg text-gray-500"><span class="font-semibold">Adicione a imagem da notícia</span> ou clique e arraste neste campo (Opcional)</p>
                          <p class="text-md text-gray-500">Formato PNG ou JPG/JPEG</p>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <input id="dropzone-file-main-news" type="file" class="hidden" accept="image/png, image/jpeg" />
              </label>
            </div> 
            <div class="flex items-center justify-center w-full mt-4">
              <input type="text" name="name-img-file-main" value="<?= $nameImageMainNews ?>" class="border-2 border-gray-300 text-center rounded-lg w-full" readonly/>
            </div>
          </div>
          
          <div class="relative z-0">
            <input class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
            placeholder=" " type="text" name="subtitle"  value="<?= htmlspecialchars($inputPost['subtitle'] ?? '') ?>">
            <label class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
            peer-focus:start-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0  peer-focus:scale-90 peer-focus:-translate-y-4" for="title">Subtítulo</label>
          </div>
          
          <h1 class="text-5xl font-light text-center mb-5">Adicione o conteúdo da notícia</h1>
          
          <div class="relative z-0">
              <input class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
              placeholder=" " type="text" name="title-content">
              <label class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
              peer-focus:start-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0  peer-focus:scale-90 peer-focus:-translate-y-4" for="title">Título do conteúdo</label>
          </div>
          
          <div class="relative z-0">
            <div class="flex items-center justify-center w-full">
              <label for="dropzone-file-content-news" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                      <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                      </svg>
                      <p class="mb-2 text-lg text-gray-500"><span class="font-semibold">Adicione a imagem da notícia</span> ou clique e arraste neste campo (opcional)</p>
                      <p class="text-md text-gray-500">Formato PNG ou JPG/JPEG</p>
                      <div id="image-preview-content" class="mt-4 flex justify-center"></div>
                  </div>
                  <input id="dropzone-file-content-news" name="img-file-content" type="file" class="hidden" accept="image/png, image/jpeg" />
              </label>
            </div> 
            <div class="flex items-center justify-center w-full mt-4">
              <input type="text" name="name-img-file-content" value="" class="border-2 border-gray-300 text-center rounded-lg w-full" readonly/>
            </div>
          </div>
          
          <div class="relative z-0">
              <input class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
              placeholder=" " type="text" name="subtitle-content">
              <label class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
              peer-focus:start-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0  peer-focus:scale-90 peer-focus:-translate-y-4" for="title">Subtítulo do conteúdo</label>
          </div>
          
          <div class="relative z-0">
            <textarea name="text-content" class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-1 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer resize-none h-50"
            placeholder=" " resize></textarea>
            <label class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-1 origin-[0] 
            peer-focus:start-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0  peer-focus:scale-90 peer-focus:-translate-y-4" for="title">Texto do conteúdo</label>
          </div>
          
          <button type="submit">
            <span class="bg-green-600 w-15 p-2 flex items-center justify-center rounded-lg text-lg text-white hover:bg-green-500 duration-100">Adicionar notícia</span>
          </button>
          
          <button type="button" onclick="history.back(-1)" class="bg-yellow-600 w-15 p-2 flex items-center justify-center rounded-lg text-lg text-white hover:bg-yellow-500 duration-100">
            Voltar
          </button>
      
      </form>