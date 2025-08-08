<h1 class="text-5xl font-light text-center mb-5">Adicione uma notícia</h1>
    <div class="p-10 w-full">
      <form action="form-add-content.php" enctype="multipart/form-data" class="space-y-4 p-5 grid grid-cols-1 gap-10" method="post">
        <div class="relative z-0">
          <input class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
          placeholder=" " type="text" name="title">
          <label class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
          peer-focus:start-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0  peer-focus:scale-90 peer-focus:-translate-y-4" for="title">Título da notícia</label>
        </div>
        <div class="relative z-0">
          <div class="flex items-center justify-center w-full">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-lg text-gray-500"><span class="font-semibold">Adicione a imagem da notícia</span> ou clique e arraste neste campo</p>
                    <p class="text-md text-gray-500">Formato PNG ou JPG/JPEG</p>
                    <div id="image-preview" class="mt-4 flex justify-center"></div>
                </div>
                <input id="dropzone-file" type="file" class="hidden" />
            </label>
          </div> 
          <div class="flex items-center justify-center w-full mt-4">
            <input type="text" name="image" class="border-2 border-gray-300 rounded-lg" readonly/>
          </div>
        </div>
        <div class="relative z-0">
          <input class="block py-2.5 px-0 w-full text-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
          placeholder=" " type="text" name="subtitle">
          <label class="absolute text-md text-gray-500 duration-300 transform -translate-y-4 scale-100 top-3 -z-10 origin-[0] 
          peer-focus:start-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0  peer-focus:scale-90 peer-focus:-translate-y-4" for="title">Subtítulo</label>
        </div>
        <button type="submit" class="bg-green-600 w-15 p-2 flex items-center justify-center rounded-lg text-lg text-white hover:bg-green-500 duration-100">
          Continuar
        </button>
        
      </form>
    </div>
    <script>
      document.getElementById('dropzone-file').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const uploadArea = document.getElementById('upload-area');
    const imagePathInput = document.getElementById('image-path');
    const previewContainer = document.getElementById('image-preview');
    
    if (file) {
      // Atualiza o campo de texto com o nome do arquivo
      imagePathInput.value = file.name;
      
      // Limpa o container de preview
      previewContainer.innerHTML = '';
      
      // Cria um elemento de imagem para o preview
      const img = document.createElement('img');
      img.src = URL.createObjectURL(file);
      img.alt = 'Pré-visualização da imagem';
      img.className = 'max-h-64 rounded-lg';
      
      // Adiciona a imagem ao container de preview
      previewContainer.appendChild(img);
      
      // Opcional: esconde a área de upload (ou modifica conforme necessário)
      uploadArea.style.display = 'none';
    } else {
      // Se nenhum arquivo foi selecionado, mostra a área de upload novamente
      uploadArea.style.display = 'flex';
      imagePathInput.value = '';
      previewContainer.innerHTML = '';
    }
  });
    </script>