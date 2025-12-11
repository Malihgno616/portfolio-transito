    <div class="flex justify-center">
        <p class="text-md font-normal p-4 text-gray-500 dark:text-gray-400">
            Total de registros <span class="font-semibold text-gray-900"> <?= $totalBeneficiarios; ?>
        </p>
        <p class="text-md font-normal p-4 text-gray dark:text-gray-400">
            Último cartão emitido <span class="font-semibold text-gray-900"> 123456</span>
        </p>
    </div>
    <form class="max-w-4xl mx-auto m-10">   
        <label for="search" class="block mb-2.5 text-sm font-medium text-heading sr-only ">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
            </div>
            <input type="search" id="search" class="block w-full p-3 ps-9 bg-neutral-secondary-medium border border-gray-200 text-heading text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-600 shadow-xs placeholder:text-body" placeholder="Digite informações do beneficiário para filtrar (RG, Nº do cartão, Nome, ou Data de nascimento no formato dd/mm/aaaa)" required />
            <button type="button" class="absolute end-1.5 bottom-1.5 text-black bg-yellow-500 hover:bg-yellow-300 box-border border border-transparent focus:ring-4 focus:ring-yellow-100 shadow-xs font-medium leading-5 rounded text-xs px-3 py-1.5 focus:outline-none">Pesquisar</button>
        </div>
    </form>
    <div class="flex justify-center animate__animated animate__fadeIn">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
                <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-blue-500 hover:underline"><a href="?orderBy=id">ID</a></th>

                        <th scope="col" class="text-center px-6 py-3 text-blue-500 hover:underline"><a href="?orderBy=name">Nome</a></th>
                        
                        <th scope="col" class="px-6 py-3">Nº Telefone</th>
                                             
                        <th scope="col" class="px-6 py-3 text-blue-500 hover:underline"><a href="?orderBy=reg">Nº REG</a></th>
                        
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
                                    <button type="submit" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200" <?= intval($beneficiario['numero_registro']) === 0 ? 'disabled' : ''?>>
                                        <i class="fa-solid fa-print"></i>
                                    </button>
                                </form>
                                
                                <button data-modal-target="register-num-deficiente-<?= $beneficiario['id']?>" data-modal-toggle="register-num-deficiente-<?= $beneficiario['id']?>" class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-700 dark:text-yellow-700 hover:bg-yellow-200">Registrar</button>
                                
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
                                                href="?orderBy=<?= $order ?>&page=<?= $currentPage - 1 ?>">
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
                                                href="?orderBy=<?= $order ?>&page=<?= $x ?>">
                                                    <?= $x ?>
                                                </a>
                                            </li>
                                        <?php endfor; ?>
                                        
                                        <!-- Botão Próximo -->
                                        <li>
                                            <?php if ($currentPage < $totalPages): ?>
                                                <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700" 
                                                href="?orderBy=<?= $order ?>&page=<?= $currentPage + 1 ?>">
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