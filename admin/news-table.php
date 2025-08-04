<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 
include __DIR__.'/layout/header.php';
?>
  <main class="w-full h-full p-10">
    <h1 class="text-5xl font-light text-center mb-5">Notícias publicadas</h1>
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
            <?php for($x = 1; $x <= 10; $x++): ?>
            <tr class="bg-white border-b  hover:bg-gray-50">
              <td class="px-6 py-4 text-lg font-bold"><?= $x ?></td>
              <td class="px-6 py-4 text-lg">Notícia <?= $x ?></td>
              <td class="px-6 py-4 text-lg">Subtítulo <?= $x ?></td>
              <td class="px-6 py-4 text-lg flex gap-5">
                <button class="font-medium rounded-lg p-1 bg-blue-100 text-blue-600 dark:text-blue-500 hover:bg-blue-200">Visualizar</button>
                <button class="font-medium rounded-lg p-1 bg-yellow-100 text-yellow-600 dark:text-yellow-500 hover:bg-yellow-200">Editar</button>
                <button class="font-medium rounded-lg p-1 bg-red-100 text-red-600 dark:text-red-500 hover:bg-red-200">Excluir</button>
              </td>
            </tr>
            <?php endfor; ?>
          </tbody>
          <tfoot>
            <tr class="bg-gray-50">
              <td colspan="4" class="px-6 py-3">
                <nav class="flex items-center justify-between pt-2" aria-label="Table navigation">
                  <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Mostrando <span class="font-semibold text-gray-900">1-5</span> de 
                    <span class="font-semibold text-gray-900">10</span> notícias
                  </span>
                  <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <li>
                      <a class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700" href="">Anterior</a>
                    </li>
  
                    <?php for($x = 1; $x <= 5; $x++): ?>
                    <li>
                      <a class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700" href=""><?= $x?></a>
                    </li>
                    <?php endfor;?>
  
                    <li>
                      <a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 " href="">Próximo</a>
                    </li>
                  </ul>
                </nav>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </main>

<?php include __DIR__.'/layout/footer.php'; ?>