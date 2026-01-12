<?php 
    if(isset($_SESSION['success_del_contact'])) {
        echo $_SESSION['success_del_contact'];
        unset($_SESSION['success_del_contact']);
    } elseif(isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message'];
        unset($_SESSION['error_message']);
    } 
?>
  <div class="flex justify-center animate__animated animate__fadeIn">
    <div class="p-10 w-full">
    <div>
      <div class="mb-4 mt-4 relative z-0">
          <select id="orderBy" name="orderBy" onchange="location = this.value;" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer">
              <option value="?orderBy=id&page=<?= $currentPage ?>" <?= $order === 'id' ? 'selected' : '' ?>>Mais recentes</option>
              <option value="?orderBy=name&page=<?= $currentPage ?>" <?= $order === 'name' ? 'selected' : '' ?>>Nome</option>
              <option value="?orderBy=date&page=<?= $currentPage ?>" <?= $order === 'date' ? 'selected' : '' ?>>Data e Hora</option>
            </select>
          <label for="orderBy" class="absolute text-md text-gray-500 duration-300 transform -translate-y-7 scale-100 top-3 -z-10 origin-[0] 
            peer-focus:start-0 peer-focus:text-yellow-500 
            peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-1 
            peer-focus:scale-90 peer-focus:-translate-y-6">Ordenar por:</label>
      </div>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
              <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">ID</th>
                      <th scope="col" class="px-6 py-3">Nome</th>
                      <th scope="col" class="px-6 py-3">Email</th>
                      <th scope="col" class="px-6 py-3">Telefone</th>
                      <th scope="col" class="px-6 py-3">Data</th>
                      <th scope="col" class="px-6 py-3">Ações</th> 
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($contacts as $contact): ?>
                  <tr class="bg-white border-b  hover:bg-gray-50">
                      <td class="px-6 py-4 font-bold text-lg"><?=$contact['id']?></td>
                      <td class="px-6 py-4 font-bold text-lg"><?=$contact['nome']?></td>
                      <td class="px-6 py-4 text-lg"><?=$contact['email']?></td>
                      <td class="px-6 py-4 text-lg"><?=$contact['telefone']?></td>
                      <td class="px-6 py-4 text-lg"><?=date('d/m/Y H:i:s', strtotime($contact['data_enviado']))?></td>
                      <td class=" flex gap-2 px-6 py-4 text-lg">
                        <button type="button" data-modal-target="modal-<?= $contact['id'] ?>" data-modal-toggle="modal-<?= $contact['id'] ?>" class="font-medium rounded-lg p-1 bg-green-100 text-green-600 dark:text-green-500 hover:bg-green-200">Mensagem</button>
                        <form action="del-contact.php" method="post">
                            <input type="hidden" name="id" value="<?= $contact['id'] ?>">
                            <button type="submit" onclick="window.confirm('Tem certeza que deseja cancelar?')" class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">Excluir</button>
                        </form>
                      </td>
                    </tr>                    
                    <?php endforeach; ?>                   
                </tbody>
              
                <tfoot>
                        <td colspan="5" class="px-6 py-3">
                            <nav class="flex items-center justify-between pt-2" aria-label="Table navigation">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                    Mostrando <span class="font-semibold text-gray-900"><?= $start ?>-<?= $end ?></span> 
                                    de <span class="font-semibold text-gray-900"><?= $totalContacts ?></span>
                                </span>
                                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                    <li>
                                        <a href="?orderBy=<?= $order ?>&page=<?= max(1, $currentPage - 1) ?>" 
                                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 <?= $currentPage == 1 ? 'opacity-50 cursor-not-allowed' : '' ?>">
                                            Anterior
                                        </a>
                                    </li>

                                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                        <li>
                                            <a href="?orderBy=<?= $order ?>&page=<?= $i ?>" 
                                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 <?= $i == $currentPage ? 'text-yellow-600 bg-blue-50 hover:bg-yellow-100 hover:text-yellow-700' : '' ?>">
                                                <?= $i ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>

                                    <li>
                                        <a href="?orderBy=<?= $order ?>&page=<?= min($totalPages, $currentPage + 1) ?>" 
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