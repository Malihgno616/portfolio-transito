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
          <label class="block mb-2 text-md font-medium text-gray-500" for="file_input">Imagem da notícia(opcional)</label>
          <input class="block w-full text-sm border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="file_input" type="file" name="img-noticia">
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