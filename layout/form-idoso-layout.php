<?php 

$error = $_SESSION['erro-form-idoso'] ?? null;
unset($_SESSION['erro-form-idoso']);

$array_error = $_SESSION['err-fields'] ?? null;
unset($_SESSION['err-fields']);

$success = $_SESSION['success-form-idoso'] ? $_SESSION['success-form-idoso'] : null;
unset($_SESSION['success-form-idoso']);

$error_sql = isset($_SESSION['error-sql']) ?: null;
unset($_SESSION['error-sql']);

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

?>

<div class="flex flex-col justify-center items-center m-20 gap-3">
  <h1 class="text-5xl md:text-2xl font-bold text-center">Cartão do Idoso</h1>
  <h2 class="text-2xl md:text-lg text-center">Preencha o formulário abaixo</h2>
  <p class="text-lg md:text-md text-justify">Assim que o cartão estiver pronto, será feito contato para agendamento da
    retirada do cartão.</p>
</div>

<form
  class="grid grid-cols-1 md:grid-cols-1 gap-4 max-w-200 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn"
  action="../config/database/form-idoso-db.php" method="post" enctype="multipart/form-data">

  <?php if ($error): ?>
  <div id="erro-todos"
    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50  dark:border-red-800"
    role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium">
      <p class="text-lg md:text-md"><?=$error; ?></p>
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

  <?php if($success): ?>
  <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50"
    role="alert">
    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
      viewBox="0 0 20 20">
      <path
        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <div class="ms-3 text-sm font-medium">
      <p class="text-lg md:text-md"><?=$success;?></p>
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

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php if (!empty($array_error['nome-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="nome-idoso" id=""
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" " />
      <label for="nome-idoso"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 ">Por
        favor, preencha o seu nome</label>
    </div>
    <?php else :?>
    <div class="relative mb-5">
      <input type="text" name="nome-idoso" id=""
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " />
      <label for="nome-idoso"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
        do idoso</label>
    </div>
    <?php endif; ?>
    <?php if (!empty($array_error['nascimento-idoso'])): ?>
    <div class="relative mb-5">
      <input type="date" name="nascimento-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="nasc-idoso"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha sua data de nascimento</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <input type="date" name="nascimento-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="nasc-idoso"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
        de Nascimento</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['genero-idoso'])):?>
    <div class="relative mb-5">
      <select name="genero-idoso" id="genero-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer">
        <option value="">Selecione...</option>
        <?php foreach($array_generos as $generos){
              echo "<option value='$generos'>$generos</option>";
            };?>
      </select>
      <label for="genero"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, selecione o Sexo</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <select name="genero-idoso" id="genero-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer">
        <option value="">Selecione...</option>
        <?php foreach($array_generos as $generos){
              echo "<option value='$generos'>$generos</option>";
            };?>
      </select>
      <label for="genero"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Sexo</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['endereco-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="endereco-idoso" id="nome-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" " />
      <label for="nome"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha o seu endereço</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <input type="text" name="endereco-idoso" id="rua"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " />
      <label for="nome"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Endereço(RUA,
        AV)</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['numero-endereco-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="numero-endereco-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="endereco"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha o número da sua residência</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <input type="text" name="numero-endereco-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="endereco"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Número</label>
    </div>
    <?php endif;?>
    <div class="relative mb-5">
      <input type="text" name="complemento-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="endereco"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento(opcional)</label>
    </div>
    <?php if (!empty($array_error['bairro-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="bairro-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="bairro"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha o seu bairro</label>
    </div>
    <?php else:?>
    <div class="relative mb-5">
      <input type="text" name="bairro-idoso" id="bairro"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="bairro"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Bairro</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['cep-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="cep-idoso" onblur="pesquisacep(this.value);" class=" text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500
        focus:border-red-500 focus:ring-2 focus:ring-red-500 peer" placeholder=" ">
      <label for="cep"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha o seu CEP</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <input type="text" name="cep-idoso" onblur="pesquisacep(this.value);"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="cep"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
    </div>
    <?php endif;?>
    <?php if ($array_error['cidade-idoso']):?>
    <div class="relative mb-5">
      <input type="text" name="cidade-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="cidade"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha sua cidade</label>
    </div>
    <?php else:?>
    <div class="relative mb-5">
      <input type="text" name="cidade-idoso" id="cidade"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="cidade"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cidade</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['uf-idoso'])):?>
    <div class="relative mb-5">
      <select name="uf-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
        <option value="">Selecione...</option>
        <?php foreach($estados as $sigla => $nome){
          echo "<option value='$sigla'>$nome</option>";
        } ?>
      </select>
      <label for="uf"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, selecione sua Unidade Federal(UF)</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <select name="uf-idoso" id="uf" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300
        focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
        <option value="">Selecione...</option>
        <?php foreach($estados as $sigla => $nome){
          echo "<option value='$sigla'>$nome</option>";
        } ?>
      </select>
      <label for=" uf"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        UF(Unidade
        Federal)</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['telefone-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="telefone-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="telefone"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha seu telefone</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <input type="text" name="telefone-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="telefone"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['rg-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="rg-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="rg"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, preencha seu RG</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <input type="text" name="rg-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="rg"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['data-expedicao-idoso'])):?>
    <div class="relative mb-5">
      <input type="date" name="data-expedicao-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="data-expedicao"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, coloque a data de expedição do seu RG</label>
    </div>
    <?php else:?>
    <div class="relative mb-5">
      <input type="date" name="data-expedicao-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="data-expedicao"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
        de Expedição</label>
    </div>
    <?php endif;?>
    <?php if (!empty($array_error['expedido-idoso'])):?>
    <div class="relative mb-5">
      <input type="text" name="expedido-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-red-900 rounded-lg border-2 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 peer"
        placeholder=" ">
      <label for="expedido-por"
        class="absolute text-sm text-red-500 peer-focus:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Por
        favor, digite o órgão expedidor do seu RG</label>
    </div>
    <?php else: ?>
    <div class="relative mb-5">
      <input type="text" name="expedido-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="expedido-por"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Expedido
        por</label>
    </div>
    <?php endif;?>
    <div class="relative mb-5">
      <input type="text" name="cnh-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="cnh"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CNH(Se
        for condutor)</label>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="relative mb-5">
      <input type="date" name="validade-cnh-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="validade-cnh"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Validade
        da CNH</label>
    </div>
    <div class="relative mb-5">
      <input type="text" name="email-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="email"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Digite
        seu email(opcional)</label>
    </div>
  </div>

  <div class="flex items-center justify-center w-full mb-5">
    <label for="copia-rg-idoso"
      class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
      <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-area">
        <!-- Conteúdo original -->
        <svg class="w-8 h-8 mb-4 text-yellow-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
          viewBox="0 0 20 16">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
        </svg>
        <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Selecione uma
            cópia digitalizada do RG do Idoso</span></p>
        <p class="text-lg text-gray-500 text-center dark:text-gray-400">JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
        </p>
      </div>
      <input id="copia-rg-idoso" type="file" name="copia-rg-idoso" class="hidden" accept="image/*" />
      <span id="file-name"></span>
    </label>
  </div>

  <div class="p-5 border-2 border-gray-300 rounded-lg">

    <p class="text-center text-xl">Representante: </p>
    <div class="flex justify-center items-center gap-2">
      <input type="radio" name="representante"
        class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500" id="sim">
      <label for="sim">
        <span class="custom-radio"></span> Sim
      </label>
      <input type="radio" name="representante"
        class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500" id="nao" checked>
      <label for="nao">
        <span class="custom-radio"></span> Não
      </label>
    </div>

  </div>

  <div id="representante" class="grid grid-cols-1 md:grid-cols-3  animate__animated animate__fadeIn">

    <h1 class="text-center text-2xl mb-5">Informações do Representante</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div class="relative mb-5" id="representante">
        <input type="text" name="nome-representante"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="nome-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
          do representante</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="email-representante"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="email-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="endereco-representante" id="rua-rep"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="endereco-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Endereço(RUA,
          AV)</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="numero-endereco-representante"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="numero-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nº</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="complemento-representante"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="complemento-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="bairro-representante" id="bairro-rep"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="bairro-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Bairro</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="cep-representante" onblur="pesquisacepRep(this.value);" class=" text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300
          focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
        <label for="cep-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="cidade-representante" id="cidade-rep"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="cidade-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cidade</label>
      </div>
      <div class="relative mb-5">
        <select name="uf-representante" id="uf-rep"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" ">
          <option value="">Selecione...</option>
          <?php foreach($estados as $sigla => $nome){
          echo "<option value='$sigla'>$nome</option>";
          } ?>
        </select>
        <label for="uf-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
          UF(Unidade Federal)
        </label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="telefone-representante"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " />
        <label for="telefone-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="rg-representante"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" ">
        <label for="rg-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="date" name="expedicao-representante" id=""
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" ">
        <label for=""
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
          de Expedição</label>
      </div>
    </div>
    <div class="relative mb-5">
      <input type="text" name="expedido-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="expedido-por"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Expedido
        por</label>
    </div>

    <div class="flex items-center justify-center w-full mb-5">
      <label for="copia-rg-representante"
        class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-area-representante">
          <svg class="w-8 h-8 mb-4 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
          </svg>
          <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Selecione uma
              cópia digitalizada do RG do Representante</span></p>
          <p class="text-lg text-gray-500 text-center dark:text-gray-400">JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
          </p>
        </div>
        <input id="copia-rg-representante" type="file" name="copia-rg-representante" class="hidden" accept="image/*" />
        <span id="file-name-representante"></span>
      </label>
    </div>

    <div class="flex items-center justify-center w-full mb-5">
      <label for="comprovante-representante"
        class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-comprovante-rep-idoso">
          <svg class="w-8 h-8 mb-4 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
          </svg>
          <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Selecione uma
              cópia digitalizada do Comprovante do Representante</span></p>
          <p class="text-lg text-gray-500 text-center dark:text-gray-400">JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
          </p>
        </div>
        <input id="comprovante-representante" type="file" name="comprovante-representante" class="hidden"
          accept="image/*" />
        <span id="file-name-comp-representante"></span>
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

<div class="flex flex-col justify-center items-center m-20 gap-3">
  <p class="text-lg text-justify">Núcleo de Trânsito - Tel.:(19)3572-5310 - Email: nucleodetransito@leme.sp.gov.br</p>
  <p class="text-lg text-justify">R. Dr. Armando Sales de Oliveira, nº925 - CEP 13610-220 - Leme/SP</p>
  <p class="text-lg text-justify">Horário de atendimento: Das 8:00h ás 12:00h e das 13:00 às 16:00h</p>
</div>

<script src="../assets/js/autofill-rep.js"></script>
<script src="../assets/js/autofill.js"></script>
<script src="../assets/js/exibirArquivo.js"></script>
<script src="../assets/js/exibirForm.js"></script>