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
        <?php foreach ($data as $newsItem): ?>
        <tr class="bg-white border-b  hover:bg-gray-50">
          <td class="px-6 py-4 text-lg font-bold"><?= $newsItem['id_noticia'] ?></td>
          <td class="px-6 py-4 text-lg"><?= $newsItem['titulo_principal'] ?></td>
          <td class="px-6 py-4 text-lg"><?= $newsItem['subtitulo_principal'] ?></td>
          <td class="px-6 py-4 text-lg flex gap-5">
            <button data-modal-target="highlight-news-<?= $newsItem['id_noticia'] ?>" data-modal-toggle="highlight-news-<?= $newsItem['id_noticia'] ?>" class="font-medium rounded-lg p-1 <?= $newsItem['destaque'] === 1 ? 'bg-sky-100 text-sky-600 hover:bg-sky-200' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' ?> ">
              <abbr title="Destacar a Publicação"><i class="fa-solid fa-star"></i></abbr>
            </button>
            <button data-modal-target="news-<?= $newsItem['id_noticia'] ?>" data-modal-toggle="news-<?= $newsItem['id_noticia'] ?>" class="font-medium rounded-lg p-1 bg-blue-100 text-blue-600 dark:text-blue-500 hover:bg-blue-200"><i class="fa-solid fa-eye"></i></button>
            <button data-modal-target="edit-news-<?= $newsItem['id_noticia']?>" data-modal-toggle="edit-news-<?= $newsItem['id_noticia']?>" class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-600 dark:text-yellow-500 hover:bg-yellow-200"> <i class="fa-solid fa-pen-ruler"></i></button>
            <form onsubmit="return window.confirm('Tem certeza que deseja excluir esta notícia?')" action="del-news.php" method="post">
              <input type="hidden" name="id-news" value="<?= $newsItem['id_noticia'] ?>">
              <input type="hidden" name="id-content" value="<?= $newsItem['id_conteudo'] ?>">
              <button type="submit" class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200"><i class="fa-solid fa-trash-can"></i></button>
            </form>
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
                <span class="font-semibold text-gray-900"><?= $totalNews ?></span> notícias
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

    