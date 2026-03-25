<div class="container mx-auto px-4">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach($newsItems as $newItem): ?>
        <div class="flex bg-white rounded-md shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 h-48">
          <a href="edit-news.php?id=<?= $newItem['id'] ?>" class="flex-shrink-0">
            <img src="display-image.php?id=<?= $newItem['id']; ?>&type=main" 
                alt="" 
                class="h-48 w-40 object-cover border-0">
          </a>

          <div class="ql-container ql-snow flex-1" style="border: none; font-size: 6px; height: 192px;">
              <div class="ql-editor p-3" style="height: 100%; overflow-y: auto; font-size: 6px;">
                  <?= $newItem['conteudo'] ?>
              </div>
          </div>
        </div>
      <?php endforeach; ?>
  </div>

  <div class="flex justify-evenly items-center p-5">
    
    <div>
      <p class="text-xl font-light"><?= $startItem ?> - <?= $endItem ?> de <strong><?= $totalNews ?></strong> notícias.</p>
    </div>

    <nav aria-label="Page navigation example">
      <ul class="flex -space-x-px text-lg">
        <li>
          <a href="<?= $currentPage == 1 ? '#' : '?page=' . ($currentPage - 1) ?>" 
            class="<?= $currentPage == 1 ? 'cursor-not-allowed opacity-50 pointer-events-none' : '' ?> rounded-l-md flex items-center justify-center text-white bg-yellow-500 border border-yellow-700 font-medium text-sm px-3 h-9">
            &lt;
          </a>
        </li>
        
        <?php
            $start = max(1, $currentPage - $range);
            $end = min($totalPages, $currentPage + $range);
        ?>

        <?php if ($start > 1): ?>
          <li>
            <a href="?page=1" class="flex items-center justify-center text-yellow-500 bg-gray-100 border border-yellow-700 font-medium text-sm w-9 h-9">
              1
            </a>
          </li>

        <?php if ($start > 2): ?>
            <li><span class="px-2">...</span></li>
          <?php endif; ?>
        <?php endif; ?>

        <?php for ($i = $start; $i <= $end; $i++): ?>
          <li>
            <a href="?page=<?= $i ?>" 
              class="flex items-center justify-center 
              <?= $i == $currentPage 
                ? 'text-gray-100 bg-yellow-600' 
                : 'text-yellow-500 bg-gray-100 hover:bg-yellow-600 hover:text-yellow-100' ?> 
              border border-yellow-700 font-medium text-sm w-9 h-9">
              <?= $i ?>
            </a>
          </li>
        <?php endfor; ?>

        <?php if ($end < $totalPages): ?>
          <?php if ($end < $totalPages - 1): ?>
            <li><span class="px-2">...</span></li>
          <?php endif; ?>

          <li>
            <a href="?page=<?= $totalPages ?>" 
              class="flex items-center justify-center text-yellow-500 bg-gray-100 border border-yellow-700 font-medium text-sm w-9 h-9">
              <?= $totalPages ?>
            </a>
          </li>
        <?php endif; ?>
               
        <li>
          <a href="<?= $currentPage == $totalPages ? '#' : '?page=' . ($currentPage + 1) ?>" 
            class="<?= $currentPage == $totalPages ? 'cursor-not-allowed opacity-50 pointer-events-none' : '' ?> rounded-r-md flex items-center justify-center text-yellow-500 bg-gray-100 border border-yellow-700 hover:bg-yellow-600 hover:text-yellow-100 font-medium text-sm px-3 h-9">
            &gt;
          </a>
        </li>
        
      </ul>
    </nav>
  
  </div>

</div>