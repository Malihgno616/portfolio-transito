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

  $mesExtenso = array(
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

<header class="m-auto">
  <div class="p-5 md:p-10 m-auto w-full max-w-4xl flex flex-col md:flex-row items-center justify-between">
  
    <a href="index" class="flex items-center">
      <img src="assets/img/logo-borda-branca.png" class="h-24 md:h-24" />
    </a>
    <?php
      $directory = __DIR__;
      if(strpos($_SERVER['REQUEST_URI'], 'pesquisa') !== false) {
        unset($directory); 
      } else {
        include_once "form-pesquisa-menu.php";
      } 
    ;?>
  </div>

  <div class="w-full bg-stone-800 absolute bottom-full left-0 top-10 p-0 mt-10">
    <p class="text-transparent">*</p>
  </div>

  <nav class="bg-yellow-500 m-auto flex justify-center max-w-4xl rounded-t-sm relative">
    <div class="p-4 w-full">
        <div class="flex justify-center md:hidden">
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-3 w-12 h-12 justify-center text-sm text-black rounded-lg hover:bg-gray-100 transition-all duration-200"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="hidden w-full mt-4 md:block md:w-auto md:mt-0" id="navbar-dropdown">
            <ul class="flex md:flex-row md:gap-12 justify-center flex-col gap-4 md:gap-12">
                <li class="w-full md:w-auto">
                    <a href="index"
                        class="block py-3 px-4 md:py-2 md:px-3 text-gray-900 text-xl rounded-sm md:border-0 md:p-0 md:hover:text-gray-500 hover:bg-gray-700 hover:text-white md:dark:hover:bg-transparent duration-200 text-center md:text-left"
                        aria-current="page" title="Home Page">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                </li>
                <li class="w-full md:w-auto">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-center md:justify-between w-full py-3 px-4 md:py-2 md:px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200">Multas<svg
                            class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownNavbar"
                        class="z-50 hidden font-normal bg-white divide-y divide-gray-400 rounded-lg shadow-sm w-lg md:w-65 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-3 text-sm text-gray-700 dark:text-gray-300" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="multas"
                                    class="block px-6 py-3 md:px-4 md:py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200 text-center md:text-left">Multas</a>
                            </li>
                            <li>
                                <a href="indicacao-condutor"
                                    class="block px-6 py-3 md:px-4 md:py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200 text-center md:text-left">Indicação
                                    de condutor</a>
                            </li>
                            <li>
                                <a href="recurso-multa"
                                    class="block px-6 py-3 md:px-4 md:py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200 text-center md:text-left">Formulário
                                    de recurso</a>
                            </li>
                            <li>
                                <a href="form-ait"
                                    class="block px-6 py-3 md:px-4 md:py-2 hover:bg-gray-100 text-lg dark:hover:bg-gray-600 dark:hover:text-white duration-200 text-center md:text-left">Formulário
                                    cópia de AIT</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="w-full md:w-auto">
                    <a href="servicos"
                        class="block py-3 px-4 md:py-2 md:px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200 text-center md:text-left">Serviços</a>
                </li>
                <li class="w-full md:w-auto">
                    <a href="noticias"
                        class="block py-3 px-4 md:py-2 md:px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200 text-center md:text-left">Notícias</a>
                </li>
                <li class="w-full md:w-auto">
                    <a href="contato"
                        class="block py-3 px-4 md:py-2 md:px-3 text-gray-900 text-xl rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:dark:hover:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent duration-200 text-center md:text-left">Contato</a>
                </li>
            </ul>
        </div>
    </div>
  </nav>
    
  <div class="w-full bg-stone-800 p-4">

    <div class="max-w-4xl m-auto flex flex-col md:flex-row items-center justify-between gap-2 pt-1 p-3 text-white">

      <div class="animate__animated animate__fadeIn">
        <p>Telefone: (19)3573-5310</p>
      </div>

      <div class="animate__animated animate__fadeIn text-md text-center">
        <p>
          Seja bem-vindo | 
          <?= $semana[$data] . ", " . $dia . " de " . $mesExtenso[$mes] . " de " . $ano; ?>
        </p>
      </div>

    </div>

  </div>
</header>