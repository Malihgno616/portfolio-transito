<div class="flex justify-center">
          <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="bg-yellow-100 font-semibold text-yellow-600 dark:text-yellow-800 hover:bg-yellow-200 flex justify-center items-center gap-1 m-5 rounded-xl p-2 duration-100">Adicionar Usuário <i class="fa-solid fa-user-plus"></i></button>
        </div>        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
            <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">Nome</th>
                      <th scope="col" class="px-6 py-3">Login</th>
                      <th scope="col" class="px-6 py-3">Nível</th>
                      <th scope="col" class="px-6 py-3">Ações</th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach($users as $user): ?>
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 font-bold text-lg">
                      <?=$user['username']?>
                    </td>
                    <td class="px-6 py-4 font-bold text-lg">
                      <?=$user['user_login']?>
                    </td>  
                    <td class="px-6 py-4">
                      <?=$user['level']?>
                    </td>
                    <td class="px-6 py-4 flex gap-2 text-lg">
                      <button type="button" data-modal-target="edit-user-<?= $user['id'] ?>" data-modal-toggle="edit-user-<?= $user['id'] ?>" class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-600 dark:text-yellow-500 hover:bg-yellow-200">Editar</button>
                      <form action="del-user.php" onsubmit="return window.confirm('Tem certeza que deseja excluir este usuário?')" method="post">
                        <input class="hidden" type="hidden" name="id-user" value="<?= htmlspecialchars($user['id'] ?? '') ?>">
                        <button type="submit" class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">Excluir</button>
                      </form>
                    </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
              <tfoot>
                <tr class="bg-gray">
                    <td colspan="5" class="px-6 py-3">
                        <nav class="flex items-center justify-between pt-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                Mostrando <span class="font-semibold text-gray-900"><?= $start ?>-<?= $end ?></span> de 
                                <span class="font-semibold text-gray-900"><?= $totalUsers ?></span>
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
      </div>