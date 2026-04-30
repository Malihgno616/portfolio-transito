<form action="pesquisa-noticia" class="flex items-center gap-2 w-full md:w-auto" method="get">
    <label for="search-noticia" class="sr-only">Buscar notícia</label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <i class="fas fa-search text-gray-400"></i>
        </div>
        <input 
            type="search" 
            id="search-noticia" 
            name="term" 
            class="w-full md:w-64 px-4 py-2 ps-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 text-gray-900 placeholder-gray-400" 
            placeholder="Buscar notícia..." 
        />
    </div>
    <button 
        type="submit" 
        class="px-4 py-2 bg-yellow-500 text-gray-900 font-medium rounded-lg hover:bg-yellow-300 transition-colors duration-200 whitespace-nowrap cursor-pointer focus:outline-none focus:ring-2 focus:ring-yellow-300"
    >
        <i class="fas fa-search"></i>
        <span class="sr-only">Buscar</span>
    </button>
</form>