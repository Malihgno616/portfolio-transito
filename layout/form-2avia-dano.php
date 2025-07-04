<div class="flex flex-col justify-center items-center m-20 gap-3">
  <h1 class="text-5xl md:text-2xl font-bold text-center">Cartão do Deficiente</h1>
</div>

<form action="config/database/verify-solicitacao.php" method="post" class="grid grid-cols-1 md:grid-cols-1 gap-4 max-w-180 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn">
    <?php

    if (isset($_SESSION['success-solicitacao'])) {
      echo $_SESSION['success-solicitacao'];
      unset($_SESSION['success-solicitacao']);
    }

    if (isset($_SESSION['error-solicitacao'])) {
      echo $_SESSION['error-solicitacao'];
      unset($_SESSION['error-solicitacao']);
    }
    ?>
    <div class="flex flex-col justify-center items-center m-2 gap-3">
      <h2 class="md:text-3xl text-center">
        2ª via do cartão - Dano
      </h2>
      <p class="text-lg text-justify">
        Para solicitação da 2ª via do cartão informe preencha as informações do cartão
      </p>
      <p class="text-lg text-justify">
        Informe abaixo seu RG
      </p>
    </div>
    <div class="relative mb-5">
      <input type="text" name="rg-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for=""
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG
        do beneficiário</label>
    </div>

    <div class="flex justify-center gap-5 p-5 ">
      <button type="button" class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer"
      onclick="window.location.href = 'cartao-deficiente';"><i class="fa-solid fa-arrow-left"></i> Voltar </button>
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

<script src="assets/js/formatRG.js"></script>
<script src="assets/js/acitiveSpinner.js"></script>