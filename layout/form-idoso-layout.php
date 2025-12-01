<div class="flex flex-col justify-center items-center m-20 gap-3">
  <h1 class="text-5xl md:text-2xl font-bold text-center">Cartão do Idoso</h1>
  <h2 class="text-2xl md:text-lg text-center">Preencha o formulário abaixo</h2>
  <p class="text-lg md:text-md text-justify">Assim que o cartão estiver pronto, será feito contato para agendamento da
    retirada do cartão.</p>
</div>

<form
  class="grid grid-cols-1 md:grid-cols-1 gap-4 max-w-200 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn"
  action="envio-idoso.php" method="post" enctype="multipart/form-data">

  <?php 
  
  if(isset($_SESSION['idoso-alert'])) {
    echo $_SESSION['idoso-alert'];
    unset ($_SESSION['idoso-alert']);
  }

  ?>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div class="relative mb-5">
      <input type="text" name="nome-idoso" id="nome-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full rounded-lg border-2 peer
          <?= !empty($array_error['nome-idoso']) 
            ? 'text-gray-900 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
            : 'text-gray-900 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400' ?>"
        placeholder=" " value="<?= $old_form_idoso['nome-idoso'] ?? '' ?>" />

      <label for="nome-idoso"
        class="absolute text-sm duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 
          peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
          peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 
          rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1
          <?= !empty($array_error['nome-idoso']) 
            ? 'text-red-500 peer-focus:text-red-500' 
            : 'text-gray-500 peer-focus:text-yellow-500' ?>">
        <?= !empty($array_error['nome-idoso']) ? 'Preencha o seu nome' : 'Nome do idoso' ?>
      </label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="nascimento-idoso" id="nascimento-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full rounded-lg border-2 peer
          <?= !empty($array_error['nascimento-idoso']) 
            ? 'text-gray-900 border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
            : 'text-gray-900 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400' ?>"
        placeholder=" " maxlength="10" oninput="formatDate(this)" 
        value="<?= $old_form_idoso['nascimento-idoso'] ?? '' ?>" />

      <label for="nascimento-idoso"
        class="absolute text-sm duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 
          peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 
          peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 
          rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1
          <?= !empty($array_error['nascimento-idoso']) 
            ? 'text-red-500 peer-focus:text-red-500' 
            : 'text-gray-500 peer-focus:text-yellow-500' ?>">
        <?= !empty($array_error['nascimento-idoso']) ? 'Preencha sua data de nascimento' : 'Data de nascimento' ?>
      </label>
    </div>
   
    <div class="relative mb-5">
      <select name="genero-idoso" id="genero-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 <?= !empty($array_error['genero-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
        ?> peer">
        <option value="">Selecione...</option>
        <?php foreach($array_generos as $genero): ?>
          <option value="<?= htmlspecialchars($genero) ?>" 
            <?= (isset($old_form_idoso['genero-idoso']) && $old_form_idoso['genero-idoso'] === $genero) ? 'selected' : '' ?>
            >
            <?= htmlspecialchars($genero) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <label for="genero"
        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 <?= !empty($array_error['genero-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'peer-focus:text-yellow-500' ?> top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['genero-idoso']) ? 'Selecione o seu gênero' : 'Sexo'?>
      </label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="cep-idoso" onblur="pesquisacep(this.value);"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
        <?= !empty($array_error['cep-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500 ' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
        ?> peer"
        placeholder=" " value="<?= htmlspecialchars($old_form_idoso['cep-idoso']) ?? ''?>">
      <label for="cep"
        class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 
        <?= !empty($array_error['cep-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500'
        ?> 
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['cep-idoso']) ? "Digite seu CEP" : "CEP"?>
      </label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="endereco-idoso" id="rua"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
        <?= !empty($array_error['endereco-idoso']) 
        ? 'border-red-500 text-gray-900 focus:border-red-500 focus:ring-2 focus:ring-red-500 ' 
        : 'border-gray-300 text-gray-900 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
        ?> peer"
        placeholder=" " value="<?= htmlspecialchars($old_form_idoso['endereco-idoso']) ?? ''?>"/>
      <label for="nome"
        class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 text-gray-500
        <?= !empty($array_error['endereco-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500'
        ?> 
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
          <?= !empty($array_error['endereco-idoso']) ? 'Preencha seu endereço' : "Endereço(RUA,
        AV)"?>
      </label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="numero-endereco-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
        <?= !empty($array_error['numero-endereco-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
        ?> peer"
        placeholder=" " value="<?= htmlspecialchars($old_form_idoso['numero-endereco-idoso']) ?? ''?>">
      <label for="endereco"
        class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 
        <?= !empty($array_error['numero-endereco-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500' 
        ?> top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['numero-endereco-idoso']) ? 'Preencha o nº da sua residência' : 'Número'?>
      </label>
    </div>
   
    <div class="relative mb-5">
      <input type="text" name="complemento-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
      <label for="endereco"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento(opcional)</label>
    </div>  
   
    <div class="relative mb-5">
      <input type="text" name="bairro-idoso" id="bairro"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
        <?= !empty($array_error['bairro-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400' 
        ?> peer"
        placeholder=" " value="<?= isset($old_form_idoso['bairro-idoso']) ? htmlspecialchars($old_form_idoso['bairro-idoso']) : '' ?>">
      <label for="bairro"
        class="absolute text-sm duration-300 transform -translate-y-4 scale-75 
        <?= !empty($array_error['bairro-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500 '?> 
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['bairro-idoso']) ? "Preencha seu bairro" : "Bairro" ?>
      </label>
    </div>
      
    <div class="relative mb-5">
      <input type="text" name="cidade-idoso" id="cidade"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
        <?= !empty($array_error['cidade-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
        ?> peer"
        placeholder=" " value="<?= $old_form_idoso['cidade-idoso'] ?? '' ?>">
      <label for="cidade"
        class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 
        <?= !empty($array_error['cidade-idoso'])
        ? 'text-red-500 peer-focus:text-red-500'
        : 'text-gray-500 peer-focus:text-yellow-500' 
        ?> top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['cidade-idoso']) ? 'Preencha sua cidade' : 'Cidade'?>
      </label>
    </div>

    <div class="relative mb-5">
      <select name="uf-idoso" id="uf" class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 
      <?= !empty($array_error['uf-idoso']) 
      ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
      : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
      ?> peer">
        <option value="">Selecione...</option>
        <?php foreach($estados as $sigla => $nome): ?>
          <option value="<?= $sigla ?>"
            <?= (isset($old_form_idoso['uf-idoso']) && $old_form_idoso['uf-idoso'] === $sigla) ? 'selected' : '' ?>>
            <?= $nome ?>
          </option>
        <?php endforeach; ?>
      </select>
      <label for="uf"
        class="absolute text-sm duration-300 transform -translate-y-4 scale-75 
        <?= !empty($array_error['uf-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500' 
        ?> top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['uf-idoso']) ? 'Selecione o seu Estado(UF)' : 'UF(Unidade
        Federal)'?>
      </label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="telefone-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 <?= 
        !empty($array_error['telefone-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
        ?> peer"
        placeholder=" " 
        oninput="formatPhone(this)" 
        maxlength="15"
        value="<?= htmlspecialchars($old_form_idoso['telefone-idoso'])?>">
      <label for="telefone"
        class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 <?= 
        !empty($array_error['telefone-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500'?>
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['telefone-idoso']) ? 'Preencha seu telefone' : 'Telefone' ?>
      </label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="rg-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 <?= 
        !empty($array_error['rg-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 '?> peer"
        placeholder=" " 
        oninput="formatRG(this)" 
        maxlength="12"
        value="<?= htmlspecialchars($old_form_idoso['rg-idoso']) ?? ''?>"
        >
      <label for="rg"
        class="absolute text-sm duration-300 transform -translate-y-4 scale-75 <?= 
        !empty($array_error['rg-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500'?> 
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['rg-idoso']) ? "Preencha seu RG" : "RG"?>
      </label>
    </div>
      
    <div class="relative mb-5">
      <input type="text" name="data-expedicao-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 <?= 
        !empty($array_error['data-expedicao-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400'
        ?> peer"
        placeholder=" " 
        maxlength="10" 
        oninput="formatDate(this)"
        value="<?= htmlspecialchars($old_form_idoso['data-expedicao-idoso']) ?? ''?>"
        >
      <label for="data-expedicao"
        class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 <?= 
        !empty($array_error['data-expedicao-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500'
        ?> top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['data-expedicao-idoso']) ? 'Preencha a data de expedição' : 'Data
        de Expedição'?>
      </label>
    </div>      

    <div class="relative mb-5">
      <input type="text" name="expedido-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 <?= 
        !empty($array_error['expedido-idoso']) 
        ? 'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' 
        : 'border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 '
        ?> peer"
        placeholder=" "
        value="<?= htmlspecialchars($old_form_idoso['expedido-idoso']) ?? ''?>"
        >
      <label for="expedido-por"
        class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 <?= 
        !empty($array_error['expedido-idoso']) 
        ? 'text-red-500 peer-focus:text-red-500' 
        : 'text-gray-500 peer-focus:text-yellow-500'?> 
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        <?= !empty($array_error['expedido-idoso']) ? "Preencha o órgao expedidor do seu RG" : "Expedido
        por"?>
      </label>
    </div>
    
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
      <input type="text" name="validade-cnh-idoso"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " maxlength="10" oninput="formatDate(this)">
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
      class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
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
      <input id="copia-rg-idoso" type="file" name="copia-rg-idoso" class="hidden" accept="accept=image/*"/>
      <input type="text" name="nome-arquivo-rg-idoso" id="file-name" class="h-10 text-center border-transparent bg-transparent" readonly>
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

  <div id="representante" class="grid grid-cols-1 md:grid-cols-3 text-3xl  animate__animated animate__fadeIn">

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
        <input type="text" name="cep-representante" onblur="pesquisacepRep(this.value);" class=" text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300
          focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer" placeholder=" ">
        <label for="cep-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
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
          placeholder=" " oninput="formatPhone(this)" maxlength="15"/>
        <label for="telefone-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="rg-representante"
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " maxlength="12" oninput="formatRG(this)">
        <label for="rg-representante"
          class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
      </div>
      <div class="relative mb-5" id="representante">
        <input type="text" name="expedicao-representante" id=""
          class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
          placeholder=" " maxlength="10" oninput="formatDate(this)">
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
        class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
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
        <input type="text" name="nome-arquivo-rg-rep" id="file-name-representante" class="h-10 text-center border-transparent bg-transparent" readonly>
      </label>
    </div>

    <div class="flex items-center justify-center w-full mb-5">
      <label for="comprovante-representante"
        class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
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
          <input type="text" name="nome-arquivo-comp-rep" id="file-name-comp-representante" class="h-10 text-center border-transparent bg-transparent " readonly>
      </label>
    </div>

  </div>

  <div class="flex justify-center gap-5 p-5 sm:flex-col md:text-lg">
    <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer"
      type="reset">Limpar <i class="fa-solid fa-broom"></i></button>
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

<div class="flex flex-col justify-center items-center m-20 gap-3">
  <p class="text-lg text-justify">Núcleo de Trânsito - Tel.:(19)3572-5310 - Email: nucleodetransito@leme.sp.gov.br</p>
  <p class="text-lg text-justify">R. Dr. Armando Sales de Oliveira, nº925 - CEP 13610-220 - Leme/SP</p>
  <p class="text-lg text-justify">Horário de atendimento: Das 8:00h ás 12:00h e das 13:00 às 16:00h</p>
</div>

<script src="assets//js/formatRG.js"></script>
<script src="assets/js/formatPhone.js"></script>
<script src="assets/js/formatDate.js"></script>
<script src="assets/js/activeSpinner.js"></script>
<script src="assets/js/autofill-rep.js"></script>
<script src="assets/js/autofill.js"></script>
<script src="assets/js/exibirArquivo.js"></script>
<script src="assets/js/exibirForm.js"></script>