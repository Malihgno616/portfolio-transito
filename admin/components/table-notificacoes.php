<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-blue-600 text-center">ID</th>
                <th scope="col" class="px-6 py-3 text-center">Descrição</th>
                <th scope="col" class="px-6 py-3 text-blue-600 text-center">Categoria</th>
                <th scope="col" class="px-6 py-3 text-center">Data</th>
                <th scope="col" class="px-6 py-3 text-center"></th>
                <th scope="col" class="px-6 py-3 text-center"></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($listNotificacoes)):?>
                <?php foreach($listNotificacoes as $index => $notificacoes):?>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-bold text-lg text-center"><?=$notificacoes['id']?></td>
                    <td class="px-6 py-4 font-normal text-lg text-center"><?=$notificacoes['descricao']?></td>
                    <td class="px-6 py-4 font-normal text-lg text-center"><?=$notificacoes['categoria']?></td>
                    <td class="px-6 py-4 font-normal text-lg text-center"><?=$notificacoes['data']?></td>
                    <td class="px-6 py-4 font-normal text-lg text-center">
                        <a href="<?= !empty($notificacoes['link_notificacao']) ? $notificacoes['link_notificacao'] : '#' ?>" target="_blank" rel="noopener noreferrer">
                            <i class="fa-solid fa-caret-up text-yellow-500"></i>
                        </a>    
                    </td>
                    <td class="px-6 py-4 font-normal text-lg text-center">
                        <form action="#" method="post" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            <button type="submit">
                                <i class="fa fa-trash text-red-600 hover:text-red-500 duration-75" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif;?>
        </tbody>
        <?php if ($totalPages >= 1): ?>
        <tfoot>
            <tr class="bg-gray-50">
                <td colspan="8" class="px-6 py-3">
                    <nav class="flex items-center justify-between gap-5 pt-2" aria-label="Table navigation">
                        
                        <!-- Informação de páginas -->
                        <span class="text-sm text-gray-700">
                            Página <span class="font-semibold"><?= $currentPage ?></span> de <span class="font-semibold"><?= $totalPages ?></span>
                        </span>

                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <!-- Botão Anterior -->
                            <li>
                                <?php if ($currentPage > 1): ?>
                                    <a class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700" 
                                    href="?page=<?= $currentPage - 1 ?>">
                                        Anterior
                                    </a>
                                <?php else: ?>
                                    <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-400 bg-gray-100 border border-gray-300 rounded-s-lg cursor-not-allowed">
                                        Anterior
                                    </span>
                                <?php endif; ?>
                            </li>
                            
                            <!-- Números das páginas -->
                            <?php 
                            // Calcula o range de páginas para mostrar (máximo 5 páginas)
                            $startPage = max(1, $currentPage - 2);
                            $endPage = min($totalPages, $startPage + 4);
                            $startPage = max(1, $endPage - 4);
                            
                            for ($x = $startPage; $x <= $endPage; $x++): ?>
                                <li>
                                    <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-yellow-100 hover:text-yellow-700 <?= $x == $currentPage ? ' text-yellow-600 border-gray-300' : '' ?>" 
                                    href="?page=<?= $x ?>">
                                        <?= $x ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                            
                            <!-- Botão Próximo -->
                            <li>
                                <?php if ($currentPage < $totalPages): ?>
                                    <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700" 
                                    href="?page=<?= $currentPage + 1 ?>">
                                        Próximo
                                    </a>
                                <?php else: ?>
                                    <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-400 bg-gray-100 border border-gray-300 rounded-e-lg cursor-not-allowed">
                                        Próximo
                                    </span>
                                <?php endif; ?>
                            </li>
                        </ul>
                        
                    </nav>
                </td>
            </tr>
        </tfoot>
    <?php endif; ?>
    </table>   
    
</div>