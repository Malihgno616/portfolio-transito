<?php 
session_start(); 
$erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : null;
unset($_SESSION['erro']);
?>
<form class="max-w-200 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn" action="../config/database/form-contato-db.php" method="post">
  <?php if($erro): ?>
    <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50  dark:border-red-800" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <div class="ms-3 text-sm font-medium">
          <?=$erro; ?>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"  data-dismiss-target="#alert-border-2" aria-label="Close">
          <span class="sr-only">Dismiss</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>
  <?php endif; ?>

  <div class="container mx-auto p-10 text-center">
    <h1 class="text-5xl p-3 md:text-3xl">Contato</h1>
    <h2 class="text-2xl p-3 md:text-md">Entre em contato conosco preenchendo o formulário abaixo</h2>
    <p class="text-lg p-3 md:text-md">Retornaremos o mais breve possível.</p>
  </div>
  
  <div class="relative mb-5">
    <input type="text" name="nome" id="nome" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " />
    <label for="nome" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome</label>
  </div>
  
  <div class="relative mb-5">
    <input type="email" name="email" id="email" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " />
    <label for="email" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
  </div>
  
  <div class="relative mb-5">
    <input type="tel" name="telefone" id="telefone" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" " />
    <label for="telefone" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
  </div>
  
  <div class="relative mb-5">
    <textarea name="mensagem" id="mensagem" class="text-md block px-2.5 pb-2.5 pt-4 w-full h-50 text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" ></textarea>
    <label for="mensagem" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Digite sua mensagem...</label>
  </div>
  
  <div class="flex justify-center gap-5 p-5 sm:flex-col md:text-lg">
    <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer" type="reset">Limpar <i class="fa-solid fa-broom"></i></button>
    <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer" type="submit">
      Enviar <i class="fas fa-paper-plane"></i>
    </button>
  </div>
</form>
