<div class="p-10 m-auto max-w-7xl">
    <h1 class="text-black text-center text-3xl md:text-4xl lg:text-5xl mb-4">Digite para buscar a notícia</h1>
    <div class="mb-6 m-auto max-w-2xl">
        <form action="pesquisa-noticia" class="flex items-center gap-2 max-w-2xl md:w-auto m-auto" method="get">
            <label for="search-noticia" class="sr-only">Buscar notícia</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input 
                    type="search" 
                    id="search-noticia" 
                    name="term" 
                    value="<?= htmlspecialchars($termNews) ?>"
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
    </div>
    
    <h2 class="text-black text-center text-2xl md:text-2xl lg:text-4xl p-5">
        Resultados de: <span class="text-yellow-500"><?= htmlspecialchars($termNews) ?></span>
    </h2>

    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php if(is_array($results) && !empty($results)): ?>
                <?php foreach($results as $index => $news):?>
                    <?php
                        $delays = ['animate__delay-0s', 'animate__delay-1s', 'animate__delay-2s'];
                        $delayClass = $delays[$index % count($delays)] ?? 'animate__delay-0s';
                    ?>
                    <div class="animate__animated animate__fadeInDown <?= $delayClass ?> bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow rounded-md">
                        <img class="w-full h-48 object-cover rounded-t-md" src="display-news-img?id=<?= $news['id']?>&type=main" alt="Img conteúdo da notícia" alt="<?= htmlspecialchars($news['id']) ?>" />
                        
                        <div class="ql-container ql-snow" style="border: none; height: 192px;">
                            <div class="ql-editor p-3" style="height: 100%; overflow-y: auto; ">
                                <?= $news['conteudo'] ?>
                            </div>
                        </div>
                        
                        <div class="p-5">
                            <form action="detalhe-noticia" method="get">
                                <input type="hidden" name="id" value="<?=$news['id']?>">
                                <button type="submit" class="w-40 text-center uppercase flex items-center justify-between m-auto font-bold text-black bg-yellow-500 hover:bg-yellow-200 focus:ring-4 focus:outline-none focus:ring-yellow-300 rounded-lg text-sm px-5 py-2.5 cursor-pointer duration-75" >
                                    Ler mais
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-700 col-span-full">Nenhuma notícia encontrada para o termo: <span class="text-yellow-500"><?= htmlspecialchars($termNews) ?></span></p>
            <?php endif; ?>
            </div>
        </div>
</div>  
