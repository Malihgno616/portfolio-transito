<div class="h-screen w-full flex items-center justify-center p-10 animate__animated animate__fadeIn">
  <form method="post" class="w-full max-w-lg bg-gray-500/50 rounded-lg p-6" action="login-submit.php">
    <img src="assets/img/logo-borda-branca.png" alt="logo transito leme" class="rounded-full h-30 m-auto">
    <h1 class="text-3xl text-white font-medium mb-4 text-center">Faça o login</h1>
    <h2 class="text-2xl text-white font-light mb-4 text-center">Insira as informações abaixo corretamente</h2>
    
    <?php 
    
    if(!empty($errLogin)) {
      echo $errLogin;
    }
    
    ?>

    <div class="relative mb-6">
        <input type="text" name="user-login" id="floating_filled" class="block px-2.5 pb-2.5 pt-5 w-full text-md text-gray-100 bg-gray-800/5 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-600 peer" placeholder=" " />
        <label for="floating_filled" class="absolute text-md text-gray-400 duration-300 transform -translate-y-4 scale-90 top-4 z-10 origin-[0] start-2.5 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
          Login
        </label>
    </div>

    <div class="relative mb-5">
        <input type="password" name="password" id="floating_filled" class="block px-2.5 pb-2.5 pt-5 w-full text-md text-gray-100 bg-gray-800/5 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-600 peer" placeholder=" " />
        <label for="floating_filled" class="absolute text-md text-gray-400 duration-300 transform -translate-y-4 scale-90 top-4 z-10 origin-[0] start-2.5 peer-focus:text-yellow-600 peer-focus:dark:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-90 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">
          Senha
        </label>
    </div>

   <div class="flex justify-center p-5">
      <button id="submit-btn" type="submit" class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-md px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
        <span id="btn-text">Login <i class="fa-solid fa-right-to-bracket"></i></span>
        <svg id="spinner" aria-hidden="true" class="hidden w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
        <span class="sr-only">Loading...</span>
      </button>
    </div>
    
  </form>
</div>