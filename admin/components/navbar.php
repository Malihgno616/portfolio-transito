<nav class="bg-yellow-500 border-gray-200 ">
  <div class="max-w-7xl flex flex-wrap items-center justify-between mx-auto lg:p-4 p-2">
  <a href="home.php" class="flex items-center space-x-1 rtl:space-x-reverse">
    <img src="assets/img/logo-borda-branca.png" class="lg:h-20 h-14" alt="Flowbite Logo" />
  </a>
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4  focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="lg:w-20 lg:h-20 w-14 h-14 rounded-full" src="display-user-image.php?id=<?=$_SESSION['user-id'];?>&type=user" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none divide-y rounded-lg shadow-sm bg-gray-700 divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white"><?=$_SESSION['user-login']?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Meu perfil</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Outros usuários</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Notificações</a>
          </li>
          <li>
            <a href="logout.php" class="block px-4 py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Sair</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 duration-75" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
      </button>
  </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
      <ul class="flex flex-col font-normal p-4 md:p-0 mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 text-lg">
        <li>
          <a href="home.php" class="block py-2 px-3 text-black hover:text-white rounded-sm md:bg-transparent md:text-black md:p-0 md:hover:text-white dark:text-black dark:hover:text-white md:dark:text-black md:dark:hover:text-white duration-100" aria-current="page">Home</a>
        </li>
        <li>
          <a href="servicos.php" class="block py-2 px-3 text-black hover:text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:text-black md:hover:text-white md:p-0 dark:text-black dark:hover:text-white md:dark:text-black md:dark:hover:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent duration-100">Serviços</a>
        </li>
        <li>
          <a href="noticias.php" class="block py-2 px-3 text-black hover:text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:text-black md:hover:text-white md:p-0 dark:text-black dark:hover:text-white md:dark:text-black md:dark:hover:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent duration-100">Notícias</a>
        </li>
        <li>
          <a href="notificacoes.php" class="block py-2 px-3 text-black hover:text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:text-black md:hover:text-white md:p-0 dark:text-black dark:hover:text-white md:dark:text-black md:dark:hover:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent duration-100">Todas as notificações</a>
        </li>
        <li>
          <a href="contatos.php" class="block py-2 px-3 text-black hover:text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:text-black md:hover:text-white md:p-0 dark:text-black dark:hover:text-white md:dark:text-black md:dark:hover:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent duration-100">Contatos</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
