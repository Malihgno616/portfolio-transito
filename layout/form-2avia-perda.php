<div class="flex flex-col justify-center items-center m-20 gap-3">
  <h1 class="text-5xl md:text-2xl font-bold text-center">Cartão do Deficiente</h1>
</div>

<form action="" method="post" class="grid grid-cols-1 md:grid-cols-1 gap-4 max-w-180 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn">
    <div class="flex flex-col justify-center items-center m-2 gap-3">
      <h2 class="md:text-3xl text-center">
        2ª via do cartão - Perda
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
      <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer"
        type="submit">
        Próximo <i class="fa-solid fa-arrow-right"></i>
      </button>
    </div>
  </form>
