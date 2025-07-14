<div class="h-screen w-full flex items-center justify-center p-10 animate__animated animate__fadeIn">
  <form method="post" class="w-full max-w-lg bg-gray-500/50 rounded-lg p-6" action="login-submit.php">
    <img src="assets/img/logo-borda-branca.png" alt="logo transito leme" class="rounded-full h-30 m-auto">
    <h1 class="text-3xl text-white font-medium mb-4 text-center">Faça o login</h1>
    <h2 class="text-2xl text-white font-light mb-4 text-center">Insira as informações abaixo corretamente</h2>
    <div class="relative mb-6">
        <input type="text" name="username" id="floating_filled" class="block px-2.5 pb-2.5 pt-5 w-full text-md text-gray-100 bg-gray-800/5 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-600 peer" placeholder=" " />
        <label for="floating_filled" class="absolute text-md text-gray-400 duration-300 transform -translate-y-4 scale-90 top-4 z-10 origin-[0] start-2.5 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
          Usuário
        </label>
    </div>
    <div class="relative mb-5">
        <input type="password" name="password" id="floating_filled" class="block px-2.5 pb-2.5 pt-5 w-full text-md text-gray-100 bg-gray-800/5 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-600 peer" placeholder=" " />
        <label for="floating_filled" class="absolute text-md text-gray-400 duration-300 transform -translate-y-4 scale-90 top-4 z-10 origin-[0] start-2.5 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
          Senha
        </label>
    </div>
    <div class="flex justify-center p-5">
      <button type="submit" class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
        Login <i class="fa-solid fa-right-to-bracket"></i>
      </button>
    </div>
  </form>
</div>