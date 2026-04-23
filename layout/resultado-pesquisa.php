<div class="p-10">
    <h1 class="text-black text-center text-3xl md:text-4xl lg:text-5xl mb-4">Digite para iniciar a busca</h1>
    <form action="pesquisa" id="form-submit" class="flex items-center justify-center gap-2 w-full md:w-auto" method="get">
        <input type="search" name="term" id="term" placeholder="Digite aqui..." class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $term ?>"/>
        <button type="submit" class="px-4 py-2 bg-yellow-500 text-gray-900 font-medium rounded-lg hover:bg-yellow-600 duration-200 whitespace-nowrap cursor-pointer">Buscar</button>
    </form>
    
    <div class="mt-5">
        <h2 class="text-black text-center text-2xl md:text-3xl lg:text-4xl mb-6">Resultados de: <span class="text-yellow-500"><?= $term ?></span></h2>
        <div id="results" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
    </div>

</div>  
