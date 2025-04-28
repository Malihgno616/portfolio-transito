<?php 

$success = $_SESSION['success-form-deficiente'] ?? null;
unset($_SESSION['success-form-deficiente']);

$error_form_def = $_SESSION['error-form-deficiente'] ?? null;
unset($_SESSION['error-form-deficiente']);

$array_error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);

$estados = array(
	'AC' => 'Acre',
	'AL' => 'Alagoas',
	'AP' => 'Amapá',
	'AM' => 'Amazonas',
	'BA' => 'Bahia',
	'CE' => 'Ceará',
	'DF' => 'Distrito Federal',
	'ES' => 'Espirito Santo',
	'GO' => 'Goiás',
	'MA' => 'Maranhão',
	'MS' => 'Mato Grosso do Sul',
	'MT' => 'Mato Grosso',
	'MG' => 'Minas Gerais',
	'PA' => 'Pará',
	'PB' => 'Paraíba',
	'PR' => 'Paraná',
	'PE' => 'Pernambuco',
	'PI' => 'Piauí',
	'RJ' => 'Rio de Janeiro',
	'RN' => 'Rio Grande do Norte',
	'RS' => 'Rio Grande do Sul',
	'RO' => 'Rondônia',
	'RR' => 'Roraima',
	'SC' => 'Santa Catarina',
	'SP' => 'São Paulo',
	'SE' => 'Sergipe',
	'TO' => 'Tocantins',
);

$array_generos = [
  "Masculino",
  "Feminino",
];

$deficiencias = [
  "Deficiência Física",
  "Membro(s) Superior(es)",
  "Membro(s) Inferior(es)",
  "Cadeira de Rodas",
  "Aparelhagem Ortopédica",
  "Prótese",
  "Incapacidade Mental",
  "Dificuldade de Locomoção"
];

?>

<div class="flex flex-col justify-center items-center m-20 gap-3">
  <h1 class="text-5xl md:text-2xl font-bold text-center">Cartão do Deficiente Físico</h1>
  <h2 class="text-2xl md:text-lg text-center">Preencha o formulário abaixo</h2>
  <p class="text-lg md:text-md text-justify"> Assim que o cartão estiver pronto, será feito contato para agendamento da
    retirada do cartão</p>
</div>

<form
  class="grid grid-cols-1 md:grid-cols-1 gap-4 max-w-180 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn"
  action="../config/database/form-deficiente-db.php" method="post" class="form animate__animated animate__fadeIn"
  enctype="multipart/form-data">

  <?php if ($success): ?>
  <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50"
    role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium">
      <p class="text-lg md:text-md">Informações enviadas com sucesso.</p>
    </div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
      data-dismiss-target="#alert-border-3" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>
  <?php endif;?>

  <?php if ($error_form_def): ?>
  <div id="erro-todos"
    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50  dark:border-red-800"
    role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium">
      <p class="text-lg md:text-md">
        <?=$error_form_def;?>
    </div>
    <button type="button"
      class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
      data-dismiss-target="#erro-todos" aria-label="Close">
      <span class="sr-only">Dismiss</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
      </svg>
    </button>
  </div>
  <?php endif;?>

  <?php if(!empty($array_error['nome-beneficiario'])): ?>
  <div class="relative mb-5">
    <input
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" " type="text" name="nome-beneficiario">
    <label for="beneficiario"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha o seu nome</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" " type="text" name="nome-beneficiario">
    <label for="beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
      do Beneficiário</label>
  </div>
  <?php endif;?>

  <?php if(!empty($array_error['nascimento-beneficiario'])): ?>
  <div class="relative mb-5">
    <input type="date" name="nascimento-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="nascimento-beneficiario"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Preencha
      sua data de nascimento</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="date" name="nascimento-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="nascimento-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
      de Nascimento</label>
  </div>
  <?php endif;?>

  <?php if (!empty($array_error['genero-beneficiario'])): ?>
  <div class="relative mb-5">
    <select name="genero-beneficiario" id="genero-deficiente"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
      <option value="">Selecione</option>
      <?php foreach ($array_generos as $genero) {
          echo "<option value='$genero'>$genero</option>";
        } ?>
    </select>
    <label for="genero-beneficiario"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, selecione o sexo</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <select name="genero-beneficiario" id="genero-deficiente"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
      <option value="">Selecione</option>
      <?php foreach ($array_generos as $genero) {
          echo "<option value='$genero'>$genero</option>";
        } ?>
    </select>
    <label for="genero-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Sexo</label>
  </div>
  <?php endif;?>

  <?php if (!empty($array_error['endereco-beneficiario'])): ?>
  <div class="relative mb-5">
    <input type="text" name="endereco-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="endereco"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha seu endereço</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="endereco-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="endereco"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Endereço(RUA,
      AV)</label>
  </div>
  <?php endif;?>

  <?php if (!empty($array_error['numero-beneficiario'])):?>
  <div class="relative mb-5">
    <input type="text" name="numero-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="numero-beneficiario"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha o número de sua residência</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="numero-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="numero-beneficiario" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500
        duration-300 transform -translate-y-4 scale-75
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
        peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
        peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Número</label>
  </div>
  <?php endif; ?>

  <div class="relative mb-5">
    <input type="text" name="complemento-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="complemento-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento(opcional)</label>
  </div>

  <?php if (!empty($array_error['bairro-beneficiario'])): ?>
  <div class="relative mb-5">
    <input type="text" name="bairro-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="bairro-deficiente"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor,
      preencha o seu bairro</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="bairro-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="bairro-deficiente" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
    top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
    peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
    peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Bairro</label>
  </div>
  <?php endif;?>

  <?php if (!empty($array_error['cep-beneficiario'])):?>
  <div class="relative mb-5">
    <input type="text" name="cep-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="cep-deficiente"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha seu CEP</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="cep-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="cep-deficiente" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
      top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
      peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
      peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
  </div>
  <?php endif; ?>

  <?php if (!empty($array_error['cidade-beneficiario'])):?>
  <div class="relative mb-5">
    <input type="text" name="cidade-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="cidade-beneficiario"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha sua cidade</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="cidade-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="cidade-beneficiario" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
      top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
      peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
      peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cidade</label>
  </div>
  <?php endif; ?>

  <?php if (!empty($array_error['uf-beneficiario'])): ?>
  <div class="relative mb-5">
    <select name="uf-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
      <option value="">Selecione...</option>
      <?php foreach ($estados as $estado) {
              echo "<option value='$estado'>$estado</option>";
            }?>
    </select>
    <label for="uf-deficiente"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, selecione o seu estado</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <select name="uf-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
      <option value="">Selecione...</option>
      <?php foreach ($estados as $estado) {
              echo "<option value='$estado'>$estado</option>";
            }?>
    </select>
    <label for="uf-deficiente" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
      top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
      peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
      peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Estado</label>
  </div>
  <?php endif;?>

  <?php if (!empty($array_error['telefone-beneficiario'])):?>
  <div class="relative mb-5">
    <input type="text" name="telefone-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="telefone-deficiente"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha seu telefone</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="telefone-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="telefone-deficiente"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
  </div>
  <?php endif; ?>

  <?php if (!empty($array_error['rg-beneficiario'])): ?>
  <div class="relative mb-5">
    <input type="text" name="rg-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="rg-deficiente"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha seu RG</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="rg-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="rg-deficiente"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
  </div>
  <?php endif; ?>

  <?php if (!empty($array_error['expedicao-beneficiario'])): ?>
  <div class="relative mb-5">
    <input type="date" name="expedicao-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="expedicao-beneficiario"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Pord
      favor, preencha a data de expedição de seu RG </label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="date" name="expedicao-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="expedicao-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
      Expedição</label>
  </div>
  <?php endif; ?>

  <?php if(!empty($array_error['expedido-beneficiario'])): ?>
  <div class="relative mb-5">
    <input type="text" name="expedido-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="expedido-beneficiario"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha o órgão expedidor de seu RG</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="expedido-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="expedido-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Expedido
      por</label>
  </div>
  <?php endif; ?>

  <div class="relative mb-5">
    <input type="text" name="cnh-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="cnh-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CNH(Se
      for condutor)</label>
  </div>

  <div class="relative mb-5">
    <input type="date" name="validade-cnh-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="validade-cnh-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Validade
      da CNH</label>
  </div>

  <div class="relative mb-5">
    <input type="text" name="email-beneficiario"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="email-beneficiario"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Digite
      seu email(opcional)</label>
  </div>

  <div class="relative mb-5">
    <label for="copia-rg-beneficiario"
      class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
      <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-rg-beneficiario">
        <svg class="w-8 h-8 mb-4 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 20 16">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
        </svg>
        <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400">
          <span class="font-semibold">Selecione uma cópia digitadlizada do RG do beneficiário</span>
        </p>
        <p class="text-lg text-gray-500 text-center dark:text-gray-400">
          JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
        </p>
      </div>
      <input type="file" name="copia-rg-beneficiario" id="copia-rg-beneficiario" class="hidden" accept="image/*">
      <span id="file-name-rg-beneficiario"></span>
    </label>
  </div>

  <div class="flex flex-col justify-center items-center m-10 gap-3">
    <h2 class="text-3xl md:text-3xl text-center">Informações do Médico</h2>
  </div>

  <?php if (!empty($array_error['nome-medico'])): ?>
  <div class="relative mb-5">
    <input type="text" name="nome-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="nome"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha o nome do médico</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="nome-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="nome"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
      do médico </label>
  </div>
  <?php endif;?>

  <?php if (!empty($array_error['crm-medico'])): ?>
  <div class="relative mb-5">
    <input type="text" name="crm-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="registro"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha o registro profissional(CRM)</label>
  </div>
  <?php else:?>
  <div class="relative mb-5">
    <input type="text" name="crm-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="registro"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Registro
      profissional (CRM)</label>
  </div>
  <?php endif;?>

  <?php if (!empty($array_error['telefone-medico'])): ?>
  <div class="relative mb-5">
    <input type="text" name="telefone-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for="telefone"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha o telefone do médico</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="telefone-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="telefone"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
  </div>
  <?php endif; ?>

  <?php if (!empty($array_error['local-atendimento-medico'])):?>
  <div class="relative mb-5">
    <input type="text" name="local-atendimento-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-500 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
      placeholder=" ">
    <label for=""
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha o local de atendimento do médico</label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <input type="text" name="local-atendimento-medico"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for=""
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Local
      de atendimento (Rua, AV)</label>
  </div>
  <?php endif; ?>

  <div class="flex flex-col justify-center items-center m-10 gap-3">
    <h2 class="text-3xl md:text-3xl text-center">Informações Médicas</h2>
  </div>

  <p class="p-1 text-center text-lg">O requerente possui deficiência <strong>AMBULATÓRIA</strong> causada por:</p>
  <div class="shadow-lg w-100 m-auto">
    <?php foreach($deficiencias as $deficiencia): ?>
    <div class="p-5">
      <input type="checkbox"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2"
        name="deficiencia-ambulatoria[]" value="<?=$deficiencia?>">
      <label for="deficiencia" class="ms-2 text-lg font-medium text-gray-900">
        <?= $deficiencia; ?>
      </label>
    </div>
    <?php endforeach; ?>
  </div>

  <p class="text-justify text-lg p-1">Assinalar o tempo. Em sentido <strong>temporário</strong>, informar o período
    previsto de restrição médica. No mínimo 2 meses e no máximo 1 ano.</p>
  <p class="text-justify text-lg p-1">Em sentido permanente, informar o período de início de validade do cartão, com
    prazo de (05) cinco anos.</p>

  <div class="flex rounded-md gap-3 p-5 justify-center items-center border-2 border-gray-300">
    <div class="flex items-center ">
      <input type="radio"
        class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
        name="restricao-medica" value="temporaria" id="temporaria">
      <label for="temporaria" class="ms-2 text-lg font-medium text-gray-900">Temporária</label>
    </div>
    <div class="flex items-center">
      <input type="radio"
        class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
        name="restricao-medica" value="permanente" id="permanente">
      <label for="permanente" class="ms-2 text-lg font-medium text-gray-900">Permanente</label>
    </div>
  </div>

  <div class="relative mb-5">
    <input type="date" name="data-inicio" id="data-inicio"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="data-inicio" id="data-inicio"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
      de início</label>
  </div>
  <div class="relative mb-5">
    <input type="date" name="data-fim" id="data-fim"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" ">
    <label for="data-fim" id="data-fim"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
      de fim</label>
  </div>

  <p class="text-justify text-lg p-1">Descricao
    e CID da lesão que justifique a incapacidade ou dificuldade ambular</p>

  <?php if (!empty($array_error['cid'])): ?>
  <div class="relative mb-5">
    <textarea name="cid" id=""
      class="text-md block px-2.5 pb-2.5 pt-4 w-full h-50 text-gray-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"></textarea>
    <label for="cid"
      class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
      favor, preencha a descrição e CID
    </label>
  </div>
  <?php else: ?>
  <div class="relative mb-5">
    <textarea name="cid" id=""
      class="text-md block px-2.5 pb-2.5 pt-4 w-full h-50 text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"></textarea>
    <label for="cid"
      class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Descrição
      CID
    </label>
  </div>
  <?php endif; ?>

  <p class="text-justify text-lg p-1">
    Selecione a cópia digitalizada do atestado médico da pessoa portadora de
    deficiência física permanente por período de validade de (05) cinco anos ou para pessoa com dificuldade de
    locomoção temporária, por período de no mínimo (02) dois meses e no máximo (01) um ano.
  </p>.

  <div class="relative mb-5">
    <label for="atestado-medico"
      class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
      <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-atestado-medico">
        <svg class="w-8 h-8 mb-4 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 20 16">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
        </svg>
        <p class="mb-2 text-xl text-justify text-gray-500 dark:text-gray-400">
          <span class="font-semibold">Selecione a cópia digitalizada do atestado médico</span>
        </p>
        <p class="text-lg text-gray-500 text-center dark:text-gray-400">
          JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
        </p>
      </div>
      <input type="file" name="atestado-medico" id="atestado-medico" class="hidden" accept="image/*">
      <span id="file-name-atestado-medico"></span>
    </label>
  </div>

  <div class="flex rounded-md gap-3 p-5 justify-center items-center border-2 border-gray-300">

    <p>Representante: </p>

    <input type="radio" name="representante"
      class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
      id="sim">
    <label for="sim" class="ms-2 text-lg font-medium text-gray-900">
      <span class="custom-radio"></span> Sim
    </label>

    <input type="radio" name="representante"
      class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
      id="nao" checked>
    <label for="nao" class="ms-2 text-lg font-medium text-gray-900">
      <span class="custom-radio"></span> Não
    </label>

  </div>

  <div id="representante" class="animate__animated animate__fadeIn">

    <div class="flex flex-col justify-center items-center m-10 gap-3">
      <h2 class="text-3xl md:text-3xl text-center">Informações do representante</h2>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="nome-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="nome-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
        do representante</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="email-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="email-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="endereco-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="endereco-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Endereço(RUA,
        AV)</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="numero-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" "
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="numero-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nº</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="complemento-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="complemento-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="bairro-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="bairro-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Bairro</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="cep-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="cep-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="cidade-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="cidade-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cidade</label>
    </div>

    <div class="relative mb-5" id="representante">
      <select name="uf-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
        <option value="selecione">Selecione...</option>
        <?php foreach($estados as $uf){
                echo "<option value='$uf'>$uf</option>";
              }?>
      </select>
      <label for="uf"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        UF(Unidade Federal)
      </label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="telefone-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="telefone-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="rg-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="rg-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="date" name="expedicao-representante" id=""
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for=""
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
        de Expedição</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="expedido-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="expedido-por"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Expedido
        por</label>
    </div>

    <div class="relative mb-5">
      <label for=""
        class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
          <svg class="w-8 h-8 mb-4 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
          </svg>
          <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400">
            <span class="font-semibold">Selecione uma cópia digitalizada do RG do representante</span>
          </p>
          <p class="text-lg text-gray-500 text-center dark:text-gray-400">
            JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
          </p>
        </div>
        <input type="file" name="" id="" class="hidden">
        <span id="file-name"></span>
      </label>
    </div>

    <div class="relative mb-5">
      <label for=""
        class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
          <svg class="w-8 h-8 mb-4 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
          </svg>
          <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400">
            <span class="font-semibold">Selecione uma cópia digitalizada do comprovante do representante </span>
          </p>
          <p class="text-lg text-gray-500 text-center dark:text-gray-400">
            JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
          </p>
        </div>
        <input type="file" name="" id="" class="hidden">
        <span id="file-name"></span>
      </label>
    </div>
  </div>

  <div class="flex justify-center gap-5 p-5 sm:flex-col md:text-lg">
    <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer"
      type="reset">Limpar <i class="fa-solid fa-broom"></i></button>
    <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer" type="submit">
      Enviar <i class="fas fa-paper-plane"></i>
    </button>
  </div>

</form>

<script src="../assets/js/exibirData.js"></script>
<script src="../assets/js/exibirArquivoBeneficiario.js"></script>
<script src="../assets/js/exibirForm.js"></script>