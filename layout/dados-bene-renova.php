<?php 

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

session_start();

if (!isset($_SESSION['dados_beneficiario_renova'])) {
    header("Location: renovar-cartao.php");
    exit;
}

$dados_beneficiario = $_SESSION['dados_beneficiario_renova'];

?>

<form class="max-w-200 mx-auto m-20 p-5 border-2 border-gray-200 rounded-md animate__animated animate__fadeIn"  action="../config/database/edit-card-deficiente-db.php"
  method="post" accept="multipart/form-data">

  <div class="flex flex-col justify-center items-center m-5 gap-3">
    <h2 class="text-3xl md:text-2xl font-bold text-center">Informações do beneficiário</h2>
  </div>
  
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
    
    <div class="relative mb-5">
      <input
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " type="text" name="nome-beneficiario" value="<?=$dados_beneficiario['nome_beneficiario']?>">
      <label for="beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
        do Beneficiário</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="nascimento-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " oninput="formatDate(this)" maxlength="10" value="<?=$dados_beneficiario['nasc_beneficiario']?>"> <label for="nascimento-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
        de Nascimento</label>
    </div>

    <div class="relative mb-5">
      <select name="genero-beneficiario" id="genero-deficiente"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
        <option value="">Selecione</option>
        <?php 
    foreach ($array_generos as $genero) {
      $selected = ($genero === $dados_beneficiario['genero_beneficiario']) ? 'selected' : '';
      echo "<option value=\"$genero\" $selected>$genero</option>";
    } 
    ?>
      </select>
      <label for="genero-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Sexo</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="cep-beneficiario" 
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['cep_beneficiario'];?>">
      <label for="cep-deficiente" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
      top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
      peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
      peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="endereco-beneficiario" id="rua"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['endereco_beneficiario'];?>">
      <label for="endereco"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Endereço(RUA,
        AV)</label>
    </div>  

    <div class="relative mb-5">
      <input type="text" name="numero-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['numero_beneficiario'];?>">
      <label for="numero-beneficiario" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500
        duration-300 transform -translate-y-4 scale-75
        top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
        peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
        peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Número</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="complemento-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['complemento_beneficiario'] ?: 'Não possui';?>">
      <label for="complemento-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento(opcional)</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="bairro-beneficiario" id="bairro"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['bairro_beneficiario'];?>">
      <label for="bairro-deficiente" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
    top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
    peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
    peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Bairro</label>
    </div>
    
    <div class="relative mb-5">
      <input type="text" name="cidade-beneficiario" id="cidade"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['cidade_beneficiario'];?>">
      <label for="cidade-beneficiario" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
      top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
      peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
      peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cidade</label>
    </div>

    <div class="relative mb-5">
      <select name="uf-beneficiario" id="uf"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
        <option value="">Selecione...</option>
        <?php foreach($estados as $sigla => $nome){
          $selected = ($sigla === $dados_beneficiario['uf_beneficiario']) ? 'selected' : '';
          echo "<option value='$sigla' $selected>$nome</option>";
        }
        ?>
      </select>
      <label for="uf-deficiente" class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75
      top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100
      peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75
      peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Estado</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="telefone-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " maxlength="15" oninput="formatPhone(this)" value="<?=$dados_beneficiario['telefone_beneficiario'];?>">
      <label for="telefone-deficiente"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="rg-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['rg_beneficiario'];?>">
      <label for="rg-deficiente"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="expedicao-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " maxlength="10" oninput="formatDate(this)" value="<?=$dados_beneficiario['expedicao_beneficiario'];?>">
      <label for="expedicao-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
        Expedição</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="expedido-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['expedido_beneficiario'];?>">
      <label for="expedido-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Expedido
        por</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="cnh-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['cnh_beneficiario'] ?: 'Não possui';?>">
      <label for="cnh-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CNH(Se
        for condutor)</label>
    </div>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="relative mb-5">
      <input type="text" name="validade-cnh-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " maxlength="10" oninput="formatDate(this)" value=<?=$beneficiario['validade_cnh_beneficiario'];?>>
      <label for="validade-cnh-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Validade
        da CNH</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="email-beneficiario"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['email_beneficiario'] ?: 'Não possui';?>">
      <label for="email-beneficiario"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Digite
        seu email(opcional)</label>
    </div>
  </div>

  <div class="relative mb-5">
        
  <h2 class="text-3xl p-2 text-center">RG do beneficiário</h2>

    <?php if (!empty($dados_beneficiario['copia_rg_beneficiario'])): ?>
    
    <label for="copia-rg-beneficiario"
      class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
      <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-rg-beneficiario">
        <img class="w-full h-56 object-cover md:w-30" src="data:image/jpeg;base64, <?= base64_encode($dados_beneficiario['copia_rg_beneficiario'])?>">
      </div>
      <input type="file" name="copia-rg-beneficiario" id="copia-rg-beneficiario" class="hidden" accept="image/*">
      <input type="text" name="nome-arquivo-rg-benef" id="file-name-rg-beneficiario" class="h-10 text-center border-transparent bg-transparent" value="<?=$dados_beneficiario['nome_arquiv_rg_benef']?>" readonly>
    </label>
    
    <?php endif; ?>
  </div>

  <div class="flex flex-col justify-center items-center m-10 gap-3">
    <h2 class="text-3xl md:text-3xl text-center">Informações do Médico</h2>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <div class="relative mb-5">
      <input type="text" name="nome-medico"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['nome_medico'];?>">
      <label for="nome"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
        do médico </label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="crm-medico"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['crm'];?>">
      <label for="registro"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Registro
        profissional (CRM)</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="telefone-medico"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " maxlength="15" oninput="formatPhone(this)" value="<?=$dados_beneficiario['telefone_medico'];?>">
      <label for="telefone"
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
    </div>

    <div class="relative mb-5">
      <input type="text" name="local-atendimento-medico"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['local_atendimento_medico'];?>">
      <label for=""
        class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Local
        de atendimento (Rua, AV)</label>
    </div>
  </div>

  <div class="flex flex-col justify-center items-center m-10 gap-3">
    <h2 class="text-3xl md:text-3xl text-center">Informações Médicas</h2>
  </div>

  <div class="shadow-lg w-100 m-auto">
    <?php 
  $deficiencias_marcadas = explode(",", $dados_beneficiario['deficiencia_ambulatoria']);
  foreach($deficiencias as $deficiencia): 
    $checked = in_array($deficiencia, $deficiencias_marcadas) ? 'checked' : '';
  ?>
    <div class="p-5">
      <input type="checkbox"
        class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 rounded-sm focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
        name="deficiencia-ambulatoria[]" value="<?=$deficiencia?>" <?= $checked; ?>>
      <label class="ms-2 text-lg font-medium text-gray-900">
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
        name="restricao-medica" value="temporaria" id="temporaria"
        <?= ($dados_beneficiario['periodo_restricao_medica'] === 'temporaria') ? 'checked' : ''; ?>>
      <label for="temporaria" class="ms-2 text-lg font-medium text-gray-900">Temporária</label>
    </div>
    <div class="flex items-center">
      <input type="radio"
        class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
        name="restricao-medica" value="permanente" id="permanente"
        <?= ($dados_beneficiario['periodo_restricao_medica'] === 'permanente') ? 'checked' : ''; ?>>
      <label for="permanente" class="ms-2 text-lg font-medium text-gray-900">Permanente</label>
    </div>
  </div>

  <div class="relative mb-5">
    <input type="text" maxlength="10" oninput="formatDate(this)" name="data-inicio" id="data-inicio"
      class="text-md block px-2.5 pb-2.5 mt-3 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" " value=<?=$dados_beneficiario['data_inicio'];?>>
    <label for="data-inicio" id="data-inicio"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
      de início</label>
  </div>

  <div class="relative mb-5">
    <input type="text" name="data-fim" id="data-fim"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" " maxlength="10" oninput="formatDate(this)" value=<?=$dados_beneficiario['data_fim'];?>>
    <label for="data-fim" id="data-fim"
      class="absolute text-sm text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
      de fim</label>
  </div>

  <p class="text-justify text-lg p-1">Descricao
    e CID da lesão que justifique a incapacidade ou dificuldade ambular</p>

  <div class="relative mb-5">
    <textarea name="cid" id=""
      class="text-md block px-2.5 pb-2.5 pt-4 w-full h-50 text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"> <?=$dados_beneficiario['cid'];?></textarea>
    <label for="cid"
      class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Descrição
      CID
    </label>
  </div>

  <p class="text-justify text-lg p-1">
    Selecione a cópia digitalizada do atestado médico da pessoa portadora de
    deficiência física permanente por período de validade de (05) cinco anos ou para pessoa com dificuldade de
    locomoção temporária, por período de no mínimo (02) dois meses e no máximo (01) um ano.
  </p>

  <div class="relative mb-5">

    <h2 class="text-3xl p-2 text-center">Atestado médico</h2>
    
    <?php if (!empty($dados_beneficiario['atestado_medico'])): ?>

    <label for="atestado-medico"
      class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
      <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-atestado-medico">
        <img class="w-full h-56 object-cover md:w-30" src="data:image/*;base64, <?= base64_encode($dados_beneficiario['atestado_medico'])?>" alt="">
      </div>
      <input type="file" name="atestado-medico" id="atestado-medico" class="hidden" accept="image/*">
      <input type="text" name="nome-arquivo-atestado" id="file-name-atestado" class="h-10 text-center border-transparent bg-transparent" value="<?=$dados_beneficiario['nome_arquiv_atestado'];?>" readonly>
    </label>

    <?php endif; ?>
  </div>

  <div class="flex rounded-md gap-3 p-5 justify-center items-center border-2 border-gray-300">

    <p>Representante: </p>

    <input type="radio" name="representante"
      class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
      id="sim" checked>
    <label for="sim" class="ms-2 text-lg font-medium text-gray-900">
      <span class="custom-radio"></span> Sim
    </label>

    <input type="radio" name="representante"
      class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 dark:focus:ring-yellow-500 focus:ring-2"
      id="nao">
    <label for="nao" class="ms-2 text-lg font-medium text-gray-900">
      <span class="custom-radio"></span> Não
    </label>

  </div>

  <div id="representante" class="animate__animated animate__fadeIn">

    <div class="flex flex-col justify-center items-center m-10 gap-3">
      <h2 class="text-3xl md:text-3xl text-center">Informações do representante</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
    <div class="relative mb-5" id="representante">
      <input type="text" name="nome-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['nome_representante'] ?: 'Não possui'?>">
      <label for="nome-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nome
        do representante</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="email-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['email_representante'] ?: 'Não possui'?>">
      <label for="email-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Email</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="cep-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['cep_representante'] ?: 'Não possui'?>">
      <label for="cep-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">CEP</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="endereco-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['endereco_representante'] ?: 'Não possui'?>">
      <label for="endereco-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Endereço(RUA,
        AV)</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="numero-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" "
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['num_representante'] ?: 'Não possui'?>">
      <label for="numero-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Nº</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="complemento-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['complemento_representante'] ?: 'Não possui'?>">
      <label for="complemento-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Complemento</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="bairro-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['bairro_representante'] ?: 'Não possui'?>">
      <label for="bairro-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Bairro</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="cidade-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['cidade_representante'] ?: 'Não possui'?>">
      <label for="cidade-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Cidade</label>
    </div>

    <div class="relative mb-5" id="representante">
      <select name="uf-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" ">
        <option value="">Selecione...</option>
        <?php foreach($estados as $sigla => $nome){
          $selected = ($sigla === $dados_beneficiario['uf_representante']) ? 'selected' : 'Não possui';
          echo "<option value='$sigla' $selected>$nome</option>";
        }
        ?>
      </select>
      <label for="uf"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        UF(Unidade Federal)
      </label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="telefone-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " maxlength="15" oninput="formatPhone(this)" value="<?=$dados_beneficiario['telefone_representante'] ?: 'Não possui'?>">
      <label for="telefone-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Telefone</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="rg-representante"
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " value="<?=$dados_beneficiario['rg_representante'] ?: 'Não possui'?>">
      <label for="rg-representante"
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">RG</label>
    </div>

    <div class="relative mb-5" id="representante">
      <input type="text" name="expedicao-representante" id=""
        class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
        placeholder=" " maxlength="10" oninput="formatDate(this)" value="<?=$dados_beneficiario['expedicao_representante'] ?: 'Não possui'?>">
      <label for=""
        class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Data
        de Expedição</label>
    </div>   
    
  </div>
  <div class="relative mb-5">
    <input type="text" name="expedido-representante"
      class="text-md block px-2.5 pb-2.5 pt-4 w-full text-gray-900 rounded-lg border-2 border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 peer"
      placeholder=" " value="<?=$dados_beneficiario['expedido_representante'] ?: 'Não possui'?>">
    <label for="expedido-por"
      class="absolute text-md text-gray-500 peer-focus:text-yellow-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">Expedido
      por</label>
  </div>
  <div class="relative mb-5">

    <h2 class="text-3xl p-2 text-center">RG do representante</h2>

    <?php if (!empty($dados_beneficiario['copia_rg_representante'])):?>
      <label for=""
      class="flex flex-col items-center justify-center w-full h- border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
      <div class="flex flex-col items-center justify-center pt-5 pb-6">
          <img class="w-full h-56 object-cover md:w-30" src="data:image/*;base64, <?=base64_encode($dados_beneficiario['copia_rg_representante']);?>" alt="">
      </div>
      <input id="copia-rg-representante-def" type="file" name="copia-rg-representante" class="hidden"
        accept="image/*" />
      <input type="text" name="nome-arquivo-rg-rep-def" id="file-name-representante-def" class="h-10 text-center border-transparent bg-transparent" value="<?=$dados_beneficiario['nome_arquiv_rg_rep']?>" readonly>
    </label>
      <?php else: ?>
        <label for=""
          class="flex flex-col items-center justify-center w-full h-74 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
          <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <svg class="w-8 h-8 mb-4 text-yellow-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 16">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
              </svg>
              <p class="mb-2 text-xl text-center text-gray-500 dark:text-gray-400">
                <span class="font-semibold">Selecione uma cópia digitalizada do RG do representante </span>
              </p>
              <p class="text-lg text-gray-500 text-center dark:text-gray-400">
                JPG, PNG ou PDF <strong>(OBRIGATÓRIO)</strong>
              </p>
          </div>
          <input type="file" name="" id="" class="hidden">
          <span id="file-name"></span>
        </label>
    <?php endif;?>
  </div>

  <div class="relative mb-5">      

    <h2 class="text-3xl p-2 text-center">Comprovante do representante</h2>

    <?php if (!empty($dados_beneficiario['comprovante_representante'])):?>
      <label for=""
      class="flex flex-col items-center justify-center w-full h-80 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-yellow-700 hover:bg-gray-100">
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <img class="w-full h-56 object-cover md:w-30" src="data:image/*;base64, <?=base64_encode($dados_beneficiario['comprovante_representante']);?>">
        </div>
        <input id="comprovante-representante-def" type="file" name="comprovante-representante" class="hidden"
        accept="image/*" />
        <input type="text" name="nome-arquivo-comp-rep-def" id="file-name-comp-representante-def"" class="h-10 text-center border-transparent bg-transparent" value="<?=$dados_beneficiario['nome_arquiv_comp_rep']?>" readonly>
      </label>
    
    <?php else: ?>

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

    <?php endif;?>

    </div>

   
  </div>

  <div class="flex justify-center gap-5 p-5 sm:flex-col md:text-lg">
    <button class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer"
      type="reset">Limpar <i class="fa-solid fa-broom"></i></button>
    <button id="btn-enviar" class="bg-yellow-500 p-3 rounded-xl hover:bg-yellow-200 duration-200 text-xl cursor-pointer" type="submit">
      <div role="status" class="flex justify-center items-center gap-2">
          <span id="btn-txt">Salvar Alteração <i class="fa-solid fa-floppy-disk"></i></span>
          <svg id="spinner" aria-hidden="true" class="hidden w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-yellow-400" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
          </svg>
        </div>
    </button>
  </div>

</form>

<script src="../assets/js/formatPhone.js"></script>
<script src="../assets/js/formatDate.js"></script>
<script src="../assets/js/acitiveSpinner.js"></script>
<script src="../assets/js/autofill-rep.js"></script>
<script src="../assets/js/autofill.js"></script>
<script src="../assets/js/exibirArquivo.js"></script>
<script src="../assets/js/exibirForm.js"></script>