    <div class="flex justify-center">
        <p class="text-md font-normal p-4 text-gray-500 dark:text-gray-400">
            Total de registros <span class="font-semibold text-gray-900"> <?= $totalBeneficiarios; ?>
        </p>
        <p class="text-md font-normal p-4 text-gray dark:text-gray-400">
            Último cartão emitido <span class="font-semibold text-gray-900"> 123456</span>
        </p>
    </div>
    <div class="flex justify-center animate__animated animate__fadeIn">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
                <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-blue-500">ID</th>

                        <th scope="col" class="text-center px-6 py-3">Nome</th>
                        
                        <th scope="col" class="px-6 py-3">Nº Telefone</th>
                                             
                        <th scope="col" class="px-6 py-3 text-blue-500">Nº REG</th>
                        
                        <th scope="col" class="px-6 py-3">RG</th>

                        <th scope="col" class="px-6 py-3">STATUS</th>

                        <th scope="col" class="px-6 py-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($listBeneficiarios)):?>
                        <?php foreach($listBeneficiarios as $index => $beneficiario): ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td>
                                <div class="px-6 py-4 text-lg font-bold"><?= $beneficiario['id']?></div>
                            </td>
                            <td class="px-6 py-4 text-lg"><?= $beneficiario['nome_beneficiario']?></td>
                            <td class="px-6 py-4 text-lg"><?= $beneficiario['telefone_beneficiario']?></td>
                            <td class="px-6 py-4 text-center text-lg font-normal <?= intval($beneficiario['numero_registro']) === 0 ? 'bg-red-200' : 'bg-green-200' ?>">
                                <?= intval($beneficiario['numero_registro'])?>
                            </td>
                            <td class="px-6 py-4 text-lg"><?= $beneficiario['rg_beneficiario']?></td>
                            <td class="px-6 py-4 text-lg <?= intval($beneficiario['numero_registro']) === 0 ? 'bg-red-200 text-red-500 font-bold' : 'bg-green-200 text-green-500 font-bold' ?>"><?= intval($beneficiario['numero_registro']) === 0 ? 'NÃO EMITIDO' : 'EMITIDO'?></td>
                            <td class="px-6 py-4 text-lg flex gap-5">

                                <form action="detalhes-card-deficiente.php" method="get">
                                    <input type="hidden" name="id-beneficiario" value="<?= $beneficiario['id']?>">
                                    <button type="submit" class="font-medium rounded-lg p-1 bg-blue-100 text-blue-600 dark:text-blue-500 hover:bg-blue-200">
                                        <i class="fa-solid fa-pen-ruler"></i>
                                    </button>
                                </form>

                                <form action="imprimir-card-deficiente.php" method="get">
                                    <input type="hidden" name="id-beneficiario" value="<?= $beneficiario['id']?>">    
                                    <button type="submit" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200">
                                        <i class="fa-solid fa-print"></i>
                                    </button>
                                </form>

                                <form onsubmit="return window.confirm('Tem certeza que deseja excluir este cartão?')" action="delete-beneficiario.php" method="post">
                                    <input type="hidden" name="id-beneficiario" value="<?= $beneficiario['id']?>">
                                    <button type="submit" class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">
                                        <i class="fa-solid fa-trash"></i>
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
                                                <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-yellow-100 hover:text-yellow-700 <?= $x == $currentPage ? ' text-yellow-600 ' : '' ?>" 
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
    </div>