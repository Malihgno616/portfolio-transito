<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
        <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-blue-600 text-center">ID</th>
                <th scope="col" class="px-6 py-3 text-center">Descrição</th>
                <th scope="col" class="px-6 py-3 text-blue-600 text-center">Categoria</th>
                <th scope="col" class="px-6 py-3 text-center">Data</th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4 font-bold text-lg text-center">1</td>
                <td class="px-6 py-4 font-normal text-lg text-center">NOVO CARTÃO PARA "NOME"</td>
                <td class="px-6 py-4 font-normal text-lg text-center">CARTÃO DO IDOSO</td>
                <td class="px-6 py-4 font-normal text-lg text-center">10/10/10 10:30</td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="bg-gray">
                <td colspan="5" class="px-6 py-3">
                    <nav class="flex items-center justify-between pt-2">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Mostrando <span class="font-semibold text-gray-900"><?= $start ?>-<?= $end ?></span> de 
                            <span class="font-semibold text-gray-900">$totalNotificacoes</span>
                        </span>
                        <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                            <li>
                                <a href="?page=<?= max(1, $currentPage - 1) ?>" 
                                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 <?= $currentPage == 1 ? 'opacity-50 cursor-not-allowed' : '' ?>">
                                    Anterior
                                </a>
                            </li>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li>
                                    <a href="?page=<?= $i ?>" 
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 <?= $i == $currentPage ? 'text-yellow-600 bg-blue-50 hover:bg-yellow-100 hover:text-yellow-700' : '' ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <li>
                                <a href="?page=<?= min($totalPages, $currentPage + 1) ?>" 
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 <?= $currentPage == $totalPages ? 'opacity-50 cursor-not-allowed' : '' ?>">
                                    Próxima
                                </a>
                            </li>
                        </ul>
                    </nav>
                </td> 
            </tr>
        </tfoot>
    </table>   
    
</div>