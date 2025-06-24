<?php 

session_start();

$erro = $_SESSION['erro'] ?? null;
$erro_campo = $_SESSION['erro-campos'] ?? [];
$sucesso_sql = $_SESSION['sucesso'] ?? null;
$old = $_SESSION['old-contact'] ?? [];

unset($_SESSION['erro'], $_SESSION['erro-campos'], $_SESSION['sucesso'], $_SESSION['old-contact']);

?>
<form class="max-w-200 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn"
  action="config/database/form-contato-db.php" method="post">

  <?php if($erro): ?>
  <div id="erro-todos"
    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50  dark:border-red-800"
    role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium">
      <p class="text-lg md:text-md"><?=$erro; ?></p>
    </div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
      data-dismiss-target="#erro-todos" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>
  <?php endif; ?>

  <?php if($sucesso_sql): ?>
  <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50"
    role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium">
      <p class="text-lg md:text-md"><?=$sucesso_sql;?></p>
    </div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
      data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>
  <?php endif;?>

  <div class="container mx-auto p-10 text-center">
    <h1 class="text-5xl p-3 md:text-3xl">Contato</h1>
    <h2 class="text-2xl p-3 md:text-md">Entre em contato conosco preenchendo o formulário abaixo</h2>
    <p class="text-lg p-3 md:text-md">Retornaremos o mais breve possível.</p>
  </div>

  <div class="relative mb-5">
    <input type="text" name="nome" id="nome"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 <?= !empty($erro_campo['nome']) 
      ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
      : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400' 
      ?> 
      peer"
      placeholder=" " value="<?= htmlspecialchars($old['nome'] ?? '') ?>"/>  
    <label for="nome"
      class="absolute text-sm 
      <?= !empty($erro_campo['nome']) 
      ? 'text-red-500 peer-focus:text-red-500' 
      : 'text-gray-500 peer-focus:text-yellow-500' ?> 
      duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
      <?= !empty($erro_campo['nome']) ? $erro_campo['nome'] : 'Nome' ?>
    </label>
  </div>

  <div class="relative mb-5">
    <input type="email" name="email" id="email"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
      <?= !empty($erro_campo['email']) 
      ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
      : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400' 
      ?> peer"
      placeholder=" " value="<?= htmlspecialchars($old['email'] ?? '') ?>"/>
    <label for="email"
      class="absolute text-sm 
      <?= !empty($erro_campo['email']) 
      ? 'text-red-500 peer-focus:text-red-500' 
      : 'text-gray-500 peer-focus:text-yellow-500' ?> 
      duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
      <?= !empty($erro_campo['email']) ? $erro_campo['email'] : 'Email' ?>
    </label>
  </div>
  
  <div class="relative mb-5">
    <input type="tel" name="telefone" id="telefone"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
      <?= !empty($erro_campo['telefone']) 
      ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
      : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400' 
      ?> peer"
      placeholder=" " maxlength="15" oninput="formatPhone(this)" value="<?= htmlspecialchars($old['telefone'] ?? '') ?>" />

    <label for="telefone"
      class="absolute text-sm 
      <?= !empty($erro_campo['telefone']) 
      ? 'text-red-500 peer-focus:text-red-500' 
      : 'text-gray-500 peer-focus:text-yellow-500' ?> duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
      <?= !empty($erro_campo['telefone']) ? $erro_campo['telefone'] : 'Telefone' ?>
    </label>
  </div>

  <div class="relative mb-5">
  <textarea name="mensagem" id="mensagem"
  class="text-indent-0 text-md pt-4 pb-2.5 px-2.5 w-full h-50 text-gray-900 rounded-lg border-2 
  <?= !empty($erro_campo['mensagem']) 
      ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
      : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400' 
  ?> peer" 
  placeholder=" "><?= htmlspecialchars($old['mensagem'] ?? '') ?></textarea>
    <label for="mensagem"
      class="absolute text-sm 
      <?= !empty($erro_campo['mensagem']) 
      ? 'text-red-500 peer-focus:text-red-500' 
      : 'text-gray-500 peer-focus:text-yellow-500' 
      ?> duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
      <?= !empty($erro_campo['mensagem']) ? $erro_campo['mensagem'] : 'Digite sua mensagem...' ?>
    </label>
  </div>

  <div class="flex justify-center gap-5 p-5 sm:flex-col md:text-lg">
    <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer"
      type="reset">Limpar <i class="fa-solid fa-broom"></i></button>
      <button id="btn-enviar" class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer" type="submit">
        <div role="status" class="flex justify-center items-center gap-2">
          <span id="btn-txt">Enviar <i class="fas fa-paper-plane"></i></span>
          <svg id="spinner" aria-hidden="true" class="hidden w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
          </svg>
        </div>
      </button>
  </div>

</form>

<script src="assets/js/formatPhone.js"></script>
<script src="assets/js/acitiveSpinner.js"></script>