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
              
              <?php if(!empty($newsItem['img_noticia'])): ?>
                  <div class="relative border rounded-lg p-2">
                      <img src="display-image.php?id=<?= $newsItem['id_noticia'] ?>" 
                          class="w-full max-h-40 object-contain mx-auto">
                      <p class="text-xs text-gray-500 mt-1 text-center">
                          <?= htmlspecialchars($newsItem['nome_img_noticia'] ?? 'Sem nome') ?>
                      </p>
                  </div>
              <?php else: ?>
                  <p class="text-sm text-gray-500">Nenhuma imagem cadastrada</p>
              <?php endif; ?>

                <h4 class="m-5 text-center text-lg font-semibold text-gray-900"><?= htmlspecialchars($newsItem['subtitulo_principal']) ?></h4>

                <?php if(!empty($newsItem['img_conteudo'])): ?>
                  <div class="relative border rounded-lg p-2">
                      <img src="display-image.php?id=<?= $newsItem['id_conteudo'] ?>" 
                          class="w-full max-h-40 object-contain mx-auto">
                      <p class="text-xs text-gray-500 mt-1 text-center">
                          <?= htmlspecialchars($newsItem['nome_img_conteudo'] ?? 'Sem nome') ?>
                      </p>
                  </div>
                <?php else: ?>
                  <p class="text-xs text-gray-500 mt-1 text-center">
                    <?= htmlspecialchars($newsItem['nome_img_noticia'] ?? 'Sem nome') ?>
                  </p>
                <?php endif;?>

                <h4 class="m-5 text-center text-lg font-semibold text-gray-900">
                  <?= htmlspecialchars($newsItem['titulo_conteudo'])?>
                </h4>
                
                <h5 class="m-5 text-center text-base font-normal text-gray-600">
                  <?= htmlspecialchars($newsItem['subtitulo_conteudo']) ?>
                </h5>

                <div class="w-full max-w-full overflow-auto">
                  <p class="text-justify break-words leading-relaxed text-gray-500">
                    <?= htmlspecialchars($newsItem['texto']) ?>
                  </p>
                </div>
                
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
                    <div class="flex items-center justify-center w-full">
                      <label for="dropzone-file-main-news" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <div id="image-preview" class="mt-4 flex justify-center">
                              <?php if(isset($newsItem) && $newsItem['img_noticia']): ?>
                                <div class="mb-6 w-full">
                                  <h2 class="text-xl font-bold mb-2 text-center">Pré-visualização da Imagem Principal</h2>
                                  <div class="flex justify-center">
                                    <img src="display-image.php?id=<?= $newsItem['id_noticia'] ?>" 
                                        alt="<?= htmlspecialchars($newsItem['nome_img_noticia']) ?>"
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
                      <input type="text" name="name-img-file-main" value="<?= $newsItem['nome_img_noticia']?>" class="border-2 border-gray-300 text-center rounded-lg w-full" readonly/>
                    </div>
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
                    <div class="flex items-center justify-center w-full">
                      <label for="dropzone-file-main-news" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <div id="image-preview" class="mt-4 flex justify-center">
                              <?php if(isset($newsItem) && $newsItem['img_conteudo']): ?>
                                <div class="mb-6 w-full">
                                  <h2 class="text-xl font-bold mb-2 text-center">Pré-visualização da Imagem do conteúdo</h2>
                                  <div class="flex justify-center">
                                    <img src="display-image.php?id=<?= $newsItem['id_conteudo'] ?>" 
                                        alt="<?= htmlspecialchars($newsItem['nome_img_conteudo']) ?>"
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
                      <input type="text" name="name-img-file-main" value="<?= $newsItem['nome_img_conteudo']?>" class="border-2 border-gray-300 text-center rounded-lg w-full" readonly/>
                    </div>
                  </div>

                  <div class="relative z-0">
                    <!-- Input da imagem do conteúdo da notícia -->
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