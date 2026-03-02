<div class="flex justify-center animate__animated animate__fadeIn">
    <table class="w-full max-w-2xl text-center text-gray-500 mt-2">
        <?php foreach($telaSiteModel->pagesTable() as $title): ?>
            <tbody class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-2xl text-black"><?= $title['titulo_pagina'] ?></td>
                    <td class="px-6 py-4 text-2xl text-gray-500 hover:text-gray-400">
                        <a href="tela.php?tela=<?= $title['id'] ?>">
                            <i class="fa-solid fa-desktop"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</div>