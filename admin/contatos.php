<?php 

session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);

if(!isset($_SESSION['username'])) {
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$dadosFic = [
  "Nome" => "João da Silva",
  "Email" => "email@email.com",
  "Telefone" => "123456789",
  "Mensagem" => "Olá, gostaria de mais informações."
];

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<?php 

include __DIR__.'/layout/header.php';

?>

<main class="w-full h-full p-10">
  <h1 class="text-5xl font-light text-center mb-5">Contatos</h1>
  <div class="flex justify-center animate__animated animate__fadeIn">
    <div class="p-10 w-full">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-800">
              <thead class="text-lg text-gray-700 uppercase bg-gray-50 dark:text-gray-400">
                  <tr>
                      <th scope="col" class="px-6 py-3">Nome</th>
                      <th scope="col" class="px-6 py-3">Email</th>
                      <th scope="col" class="px-6 py-3">Telefone</th>
                      <th scope="col" class="px-6 py-3">Mensagem</th>
                      <th scope="col" class="px-6 py-3">Ações</th> 
                  </tr>
              <tbody>
                  <?php for($x= 1; $x <= 15; $x++): ?>
                  <tr class="bg-white border-b  hover:bg-gray-50">
                      <td class="px-6 py-4 font-bold text-lg"><?=$dadosFic['Nome']?></td>
                      <td class="px-6 py-4 text-lg"><?=$dadosFic['Email']?></td>
                      <td class="px-6 py-4 text-lg"><?=$dadosFic['Telefone']?></td>
                      <td class="px-6 py-4 text-lg"><?=$dadosFic['Mensagem']?></td>
                      <td class="px-6 py-4 text-lg">
                          <a href="#" class="font-medium text-green-600 dark:text-green-500 hover:underline mr-3">Mensagem</a>
                          <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Editar</a>
                          <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Excluir</a>
                      </td>
                  </tr>
                  <?php endfor; ?>
              </tbody>
              <tfoot>
                <tr class="bg-gray-50 ">
                    <td colspan="5" class="px-6 py-3">
                        <nav class="flex items-center justify-between pt-2" aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                Mostrando <span class="font-semibold text-gray-900 ">1-15</span> de <span class="font-semibold text-gray-900 ">100</span>
                            </span>
                            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Anterior</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
                                </li>
                                <li>
                                    <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-yellow-600 border border-gray-300 bg-blue-50 hover:bg-yellow-100 hover:text-yellow-700">2</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">3</a>
                                </li>
                                <li>
                                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Próxima</a>
                                </li>
                            </ul>
                        </nav>
                    </td>
                </tr>
              </tfoot>
          </table>
      </div>
    </div>
  </div>
</main>

<?php include __DIR__.'/layout/footer.php';?> 