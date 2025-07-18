<nav class="bg-white border-gray-200 dark:bg-yellow-500">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="home.php" class="flex items-center space-x-1 rtl:space-x-reverse">
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white italic">Painel de Controle</span>
      <img src="assets/img/logo-borda-branca.png" class="h-20" alt="Flowbite Logo" />
  </a>
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-20 h-20 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1hZxkl7aLUy170veFH3FI9uDbkqoSBjMY2A&s" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white"><?=$_SESSION['username']?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Meu perfil</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Outros usuários</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Notificações</a>
          </li>
          <li>
            <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sair</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
    <ul class="flex flex-col font-normal p-4 md:p-0 mt-4 border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 text-lg">
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
        <a href="#" class="block py-2 px-3 text-black hover:text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:text-black md:hover:text-white md:p-0 dark:text-black dark:hover:text-white md:dark:text-black md:dark:hover:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent duration-100">Todas as notificações</a>
      </li>
      <li>
        <a href="contatos.php" class="block py-2 px-3 text-black hover:text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:text-black md:hover:text-white md:p-0 dark:text-black dark:hover:text-white md:dark:text-black md:dark:hover:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent duration-100">Contatos</a>
      </li>
    </ul>

  </div>
  </div>
</nav>
