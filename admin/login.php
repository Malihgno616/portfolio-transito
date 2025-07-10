<!DOCTYPE html>
<html lang="pt-br">
<?php include __DIR__.'/components/head.php';?>
<body>
<div class="bg-gray-500 bg-[url(assets/img/697.jpg)] h-183 bg-center bg-no-repeat bg-cover bg-blend-multiply">
  <div class="w-full h-full mx-20 m-auto flex items-center justify-center">
    <div class="bg-stone-500/20 rounded-2xl w-[600px] h-[600px] flex flex-col items-center gap-5">
      <h1 class="text-3xl text-white text-center p-15">Transito - Admin</h1>
      <h2 class="text-2xl text-white text-center p-15">Preencha as informações abaixo</h2>
      <form action="">
      <div class="relative z-0">
          <input type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
          <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-0 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Floating standard</label>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>