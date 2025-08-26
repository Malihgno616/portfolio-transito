    <div class="flex justify-center">
        <p class="text-md font-normal p-4 text-gray-500 dark:text-gray-400">
            Total de registros <span class="font-semibold text-gray-900"> 1000
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

                        <th scope="col" class="px-6 py-3">Nome</th>
                        
                        <th scope="col" class="px-6 py-3">Nº Telefone</th>
                                             
                        <th scope="col" class="px-6 py-3 text-blue-500">Nº REG</th>
                        
                        <th scope="col" class="px-6 py-3">RG</th>

                        <th scope="col" class="px-6 py-3 text-blue-500">STATUS</th>

                        <th scope="col" class="px-6 py-3 text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td>
                            <div class="px-6 py-4 text-lg font-bold">1</div>
                        </td>
                        <td class="px-6 py-4 text-lg">João da Silva</td>
                        <td class="px-6 py-4 text-lg">(11) 91234-5678</td>
                        <td class="px-6 py-4 text-lg font-bold text-blue-500">123456</td>
                        <td class="px-6 py-4 text-lg">MG-12.345.678</td>
                        <td class="px-6 py-4 text-lg bg-green-200 text-green-500 font-bold">EMITIDO</td>
                        <td class="px-6 py-4 text-lg flex gap-5">
                            <button class="font-medium rounded-lg p-1 bg-blue-100 text-blue-600 dark:text-blue-500 hover:bg-blue-200">Visualizar</button>
                            <button class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-600 dark:text-yellow-500 hover:bg-yellow-200">Editar</button>
                            <form onsubmit="return window.confirm('Tem certeza que deseja excluir este cartão?')" action="#" method="post">
                                <button type="submit" class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">Excluir</button>
                            </form>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="bg-gray-50">
                        <td colspan="4" class="px-6 py-3">
                            <nav class="flex items-center justify-between gap-5 pt-2" aria-label="Table navigation">
                                
                                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                    <li>
                                        <a class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700" 
                                            href="#">Anterior</a>
                                    </li>   
                                    <?php for ($x= 1; $x <= 6; $x++): ?>
                                        <li>
                                            <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700" 
                                                href="#"><?= $x ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <li>
                                        <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700" 
                                            href="#">Próximo</a>
                                    </li>
                                </ul>
                            </nav>
                        </td>
                </tfoot>
            </table>
        </div>
    </div>