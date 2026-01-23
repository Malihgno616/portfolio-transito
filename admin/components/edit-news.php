<div class="m-auto p-4 w-full max-w-2xl h-full">
    <form class="space-y-4 p-5 grid grid-cols-1 gap-10" action="" method="post">
            <?php if(!empty($idMainNews)): ?>
               
                <div class="relative z-0">
                    <input class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" type="text" value="<?= $idMainNews['titulo_principal'] ?>">
                    <label
                      for="main-title"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                        Título Principal
                    </label>
                </div>
 
                <div class="relative z-0">
                    <input class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" type="text" value="<?= $idMainNews['subtitulo'] ?>">
                    <label for="floating_subtitulo" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                        Subtítulo
                    </label>
                </div>
                  
                <div class="relative z-0">
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file-main-news" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <div id="main-image-preview" class="mt-4 flex justify-center">
                              <?php if(isset($idMainNews) && $idMainNews['img_noticia']): ?>
                                <div class="mb-6 w-full">
                                  <h2 class="text-xl font-bold mb-2 text-center">Pré-visualização da Imagem Principal</h2>
                                  <div class="flex justify-center">
                                    <img src="display-image.php?id=<?= $idMainNews['id_noticia'] ?>&type=main" 
                                        alt="<?= htmlspecialchars($idMainNews['nome_img_noticia']) ?>"
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
                          <input id="dropzone-file-main-news" name="img-file-main" type="file" class="hidden" accept="image/png, image/jpeg" />
                      </label>
                    </div> 
                    <div class="flex items-center justify-center w-full mt-4">
                      <input type="text" name="name-img-file-main" value="<?= $idMainNews['nome_img_noticia']?>" class="border-2 border-gray-300 text-center rounded-lg w-full" readonly/>
                    </div>
                </div>
                
            <?php endif;?>
            
            <hr>
            <br>

            <?php if(!empty($idContentNews)):?>
                <div class="relative z-0">
                    <input class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" type="text" value="<?= $idContentNews['titulo_conteudo'] ?>">
                    <label
                      for="content-title"
                      class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                        Título do Conteúdo
                    </label>
                </div>
                
                <div class="relative z-0">
                    <input class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" type="text" value="<?= $idContentNews['subtitulo_conteudo'] ?>">
                    <label for="floating_subtitulo_content" class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
                            peer-focus:start-0 peer-focus:text-yellow-500 
                            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                            peer-focus:scale-90 peer-focus:-translate-y-4">
                        Subtítulo do Conteúdo
                    </label>
                </div>

                <div class="relative z-0">
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file-main-news" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <div id="main-image-preview" class="mt-4 flex justify-center">
                              <?php if(isset($idContentNews) && $idContentNews['img_conteudo']): ?>
                                <div class="mb-6 w-full">
                                  <h2 class="text-xl font-bold mb-2 text-center">Pré-visualização da Imagem Principal</h2>
                                  <div class="flex justify-center">
                                    <img src="display-image.php?id=<?= $idContentNews['id_conteudo'] ?>&type=content" 
                                        alt="<?= htmlspecialchars($idContentNews['nome_img_noticia']) ?>"
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
                          <input id="dropzone-file-main-news" name="img-file-main" type="file" class="hidden" accept="image/png, image/jpeg" />
                      </label>
                    </div> 
                    <div class="flex items-center justify-center w-full mt-4">
                      <input type="text" name="name-img-file-main" value="<?= $idContentNews['nome_img_conteudo']?>" class="border-2 border-gray-300 text-center rounded-lg w-full" readonly/>
                    </div>
                </div>

                <div class="relative z-0">

                </div>
            <?php endif;?>
    </form>
</div>
