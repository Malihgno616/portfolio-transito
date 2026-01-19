<div class="flex justify-center animate__animated animate__fadeIn">
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
      <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">Título</th>
          <th scope="col" class="px-6 py-3">Subtítulo</th>
          <th scope="col" class="px-6 py-3 text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($featuredNews as $newsItem): ?>
        <tr class="bg-white border-b  hover:bg-gray-50">
          <td class="px-6 py-4 text-lg font-bold"><?= $newsItem['id_noticia'] ?></td>
          <td class="px-6 py-4 text-lg"><?= $newsItem['titulo_principal'] ?></td>
          <td class="px-6 py-4 text-lg"><?= $newsItem['subtitulo_principal'] ?></td>
          <td class="px-6 py-4 text-lg flex justify-center gap-2">
            <button data-modal-target="news-<?= $newsItem['id_noticia'] ?>" data-modal-toggle="news-<?= $newsItem['id_noticia'] ?>" class="font-medium rounded-lg p-1 bg-gray-100 text-gray-600 hover:bg-gray-200">SELECIONAR</button>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
      <tfoot>
        <tr class="bg-gray-50">
          <td colspan="4" class="px-6 py-3">
            <nav class="flex items-center justify-between pt-2" aria-label="Table navigation">
              <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                Mostrando <span class="font-semibold text-gray-900"><?= $startItem ?>-<?= $endItem ?></span> de 
                <span class="font-semibold text-gray-900"><?= $totalFeaturedNews ?></span> notícias
              </span>
              <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                <li>
                  <a class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 <?= $currentPage <= 1 ? 'opacity-50 cursor-not-allowed' : '' ?>" 
                      href="?page=<?= $currentPage - 1 ?>" <?= $currentPage <= 1 ? 'onclick="return false;"' : '' ?>>Anterior</a>
                </li>

                <?php 

                $startPage = max(1, $currentPage - 2);
                $endPage = min($totalPages, $currentPage + 2);
                
                for($x = $startPage; $x <= $endPage; $x++): ?>
                <li>
                  <a class="flex items-center justify-center px-3 h-8 leading-tight <?= $x == $currentPage ? 'text-yellow-600 bg-yellow-50' : 'text-gray-500 bg-white' ?> border border-gray-300 hover:bg-gray-100 hover:text-gray-700" 
                      href="?page=<?= $x ?>"><?= $x ?></a>
                </li>
                <?php endfor; ?>

                <li>
                  <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 <?= $currentPage >= $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>" 
                      href="?page=<?= $currentPage + 1 ?>" <?= $currentPage >= $totalPages ? 'onclick="return false;"' : '' ?>>Próximo</a>
                </li>
              </ul>
            </nav>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

    