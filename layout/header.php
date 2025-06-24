<?php 
  $data = date('D');
  $mes = date('M');
  $dia = date('d');
  $ano = date('Y');

  $semana = array(
    'Sun' => 'Domingo',
    'Mon' => 'Segunda-feira',
    'Tue' => 'Terça-feira',
    'Wed' => 'Quarta-feira',
    'Thu' => 'Quinta-feira',
    'Fri' => 'Sexta-feira',
    'Sat' => 'Sábado'
  );

  $mes_extenso = array(
    'Jan' => 'Janeiro',
    'Feb' => 'Fevereiro',
    'Mar' => 'Março',
    'Apr' => 'Abril',
    'May' => 'Maio',
    'Jun' => 'Junho',
    'Jul' => 'Julho',
    'Aug' => 'Agosto',
    'Sep' => 'Setembro',
    'Oct' => 'Outubro',
    'Nov' => 'Novembro',
    'Dec' => 'Dezembro'
  );
?>

<header>
  <nav class="bg-yellow-500">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="index" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="assets/img/logo-borda-branca.png" class="w-auto h-16 p-0" />
      </a>
      <button data-collapse-toggle="navbar-dropdown" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-black rounded-lg md:hidden hover:bg-gray-100"
        aria-controls="navbar-dropdown" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
      <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
        <ul
          class="flex flex-col font-medium p-4 md:p-0 mt-4 bg-yellow-500 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-yellow-500 ">
          <li>
            <a href="index"
              class="block py-2 px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200"
              aria-current="page" title="Home Page">
              <i class="fas fa-home mr-2"></i> Home
            </a>
          </li>
          <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
              class="flex items-center justify-between w-full py-2 px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0  md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200">Multas<svg
                class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 4 4 4-4" />
              </svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar"
              class="z-50 hidden font-normal bg-white divide-y divide-gray-400 rounded-lg shadow-sm w-65 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-300" aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="multas"
                    class="block px-4 py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200">Multas</a>
                </li>
                <li>
                  <a href="indicacao-condutor"
                    class="block px-4 py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200">Indicação
                    de condutor</a>
                </li>
                <li>
                  <a href="recurso-multa"
                    class="block px-4 py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200">Formulário
                    de recurso</a>
                </li>
                <li>
                  <a href="form-ait"
                    class="block px-4 py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200">Formulário
                    cópia de AIT</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="servicos"
              class="block py-2 px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200">Serviços</a>
          </li>
          <li>
            <a href="noticias"
              class="block py-2 px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200">Notícias</a>
          </li>
          <li>
            <a href="contato"
              class="block py-2 px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>