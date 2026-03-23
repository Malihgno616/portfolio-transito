<form action="send-news.php" method="post" class="border-2 border-gray-200 rounded-lg p-4 m-4" enctype="multipart/form-data">
  <input type="hidden" name="conteudo">
  
  <h1 class="text-center text-2xl p-4">Adicione a imagem da publicação</h1>

  <div class="relative z-0 m-4">
      <div class="flex items-center justify-center w-full">
          <label for="dropzone-img-news" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-200 dark:bg-gray-100 hover:bg-gray-100 dark:border-gray-600">
              <div id="default-content-news" class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                  </svg>
                  <p class="mb-2 text-md text-gray-500 dark:text-gray-700"><span class="font-semibold">Clique aqui</span> ou arraste o arquivo aqui</p>
                  <p class="text-lg text-gray-500 dark:text-gray-700">PNG ou JPG</p>
              </div>
              
              <div id="preview-content-news" class="flex flex-col items-center justify-center w-full h-full p-4" style="display: none;">
                  <div id="news-image-preview" class="flex items-center justify-center mb-2 w-full h-40"></div>
                  <p id="news-file-name" class="text-sm text-gray-600 font-medium text-center mt-2"></p>
              </div>
              
              <input id="dropzone-img-news" type="file" class="hidden" name="img-news" accept=".png,.jpg,.jpeg,.pdf"/>
              <input type="hidden" name="name-file-news" id="nome-aqv-news">
          </label>
      </div>
  </div>

  <h1 class="text-center text-2xl p-4">Adicione o conteúdo da notícia</h1>

  <div id="toolbar-container">
    <span class="ql-formats">
      <select class="ql-font"></select>
      <select class="ql-size"></select>
    </span>

    <span class="ql-formats">
      <button class="ql-bold"></button>
      <button class="ql-italic"></button>
      <button class="ql-underline"></button>
    </span>

    <span class="ql-formats">
      <select class="ql-color"></select>
    </span>

    <span class="ql-formats">
      <button class="ql-header" value="1"></button>
      <button class="ql-header" value="2"></button>
      <button class="ql-header" value="3"></button>
    </span>

    <span class="ql-formats"> 
      <button class="ql-direction" value="rtl"></button> 
      <select class="ql-align"></select> 
    </span>

    <span class="ql-formats">
      <button class="ql-list" value="ordered"></button>
      <button class="ql-list" value="bullet"></button>
    </span>

    <span class="ql-formats">
      <button class="ql-link"></button>
      <button class="ql-image"></button>
    </span>

  </div>

  <div id="editor" class="h-80">
    <h1 style="color: gray">Conteúdo da notícia...</h1>
  </div>

  <button type="submit" class="mt-4 text-lg md:text-xl text-center px-2 py-2 rounded-lg bg-yellow-600 text-white hover:bg-yellow-500 w-42 transition">
    Enviar o conteúdo da notícia
  </button>

</form>