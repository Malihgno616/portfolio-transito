<?php foreach ($featuredNews['news'] as $newsItem): ?>
  <div id="news-<?= $newsItem['id'] ?>" tabindex="-1" aria-hidden="true" class="animate__animated animate__fadeInDown hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                  Detalhe da notícia destacada
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="news-<?= $newsItem['id'] ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">           
                <img class="w-80 h-full p-2 m-auto" src="display-image.php?id=<?= $newsItem['id']?>&type=main" alt="Img notícia principal">
                <div class="ql-container ql-snow flex-1" style="border: none;">
                  <div class="ql-editor p-3" style="height: 100%;">
                      <?= $newsItem['conteudo'] ?>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
<?php endforeach; ?>
