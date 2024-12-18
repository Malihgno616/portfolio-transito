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

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Idoso</title>
  <link rel="stylesheet" href="../assets/css/header.scss">
  <link rel="stylesheet" href="../assets/css/global.css">
  <link rel="stylesheet" href="../assets/css/footer.scss">
  <link rel="stylesheet" href="../assets/css/form-idoso.scss">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body>
  <?php 
    include ('../layout/header.php');
  ?>
  <div class="container ">
    <h1>Formulário do Idoso</h1>
    <p>Preencha o formulário abaixo e assim que estiver pronto, entraremos em contato para agendamento de retirada.</p>
    <form action="#" class="formulario-idoso animate__animated animate__fadeIn">
      <h2>Informações do idoso</h2>
        <div>
          <input type="text" name="nome" placeholder="Nome" required>
            <label>
              Data de nascimento:
            <input type="date" name="nascimento" required>
          </label>
          <label>Sexo:
            <select name="genero" id="genero" required>
              <option value="selecione">Selecione...</option>
              <?php foreach ($array_generos as $genero): ?>
                <option value="<?= $genero ?>"><?= $genero ?></option>
              <?php endforeach; ?>
            </select>
          </label>
        </div>
        <div>
          <input type="text" name="CEP" placeholder="CEP" maxlength="12" required>
          <input type="text" name="endereco" placeholder="Endereço (Rua, Av)" required>
          <input type="text" name="bairro" placeholder="Bairro" required>
        </div>
        <div>
          <input type="text" name="complemento" placeholder="Complemento" required>
          <input type="text" name="numero" placeholder="Número" required>
          <input type="text" name="cidade" placeholder="Cidade" required>
        </div>
        <div>
          <label>
            UF:
            <select name="estado" id="uf" required>
              <option value="selecione">Selecione...</option>
              <?php foreach ($estados as $sigla => $estado): ?>
                <option value="<?php echo $sigla; ?>"><?php echo $estado; ?></option>
              <?php endforeach; ?>
            </select>
          </label>
          <input type="text" name="telefone" placeholder="Número do telefone ou celular" required>
          <input type="text" name="rg" placeholder="RG" required>
        </div>
        <div>
          <label>
            Data de expedição:
            <input type="date" name="data-exp" required>
          </label>
          <input type="text" name="expedido" placeholder="Expedido por..." required>
          <input type="text" name="numero-cnh" placeholder="Número da CNH(Caso for condutor)">
        </div>
        <div>
          <input type="date" name="validade-cnh" placeholder="Validade da CNH">
          <input type="email" name="email" placeholder="Digite seu email">
        </div>      
        <div class="docs-idoso">
          <h2>Documentos necessários</h2>
          <p>-Selecione a cópia digitalizada da sua carteira de identidate(ou documento equivalente).</p>
          <label for="rg-copia">Selecione(PNG, JPG)</label>
          <input type="file">
        </div>
        <div class="radio-representante">
          <h2>Possui representante?</h2>
          <label for="">
            <input type="radio" id="sim" name="fav_language" value="SIM">
            <label for="sim">Sim</label><br>
            <input type="radio" id="nao" name="fav_language" value="NAO">
            <label for="">Não</label><br>
          </label>
        </div>
        <div class="animate__animated animate__fadeIn" id="representante-form" style="display: none;">
          <h3>Informações do Representante</h3>
          <div>
            <input type="text" name="nome_representante" placeholder="Nome do representante">
            <input type="text" name="email_representante" placeholder="E-mail do representante">
          </div>
          <div>
            <input type="text" name="cep_representante" placeholder="CEP do representante">
            <input type="text" name="endereco_representante"
            placeholder="Endereço do representante">
            <input type="text" name="Complemento"
            placeholder="Complemento do representante">    
          </div>
          <div>
            <input type="text" name="bairro_representante" placeholder="Bairro do represente">
            <input type="text" name="numero_representante" 
            placeholder="Número do representante">
            <input type="text" name="cidade_representante" placeholder="Cidade do represente">
          </div>
          <div>
            <label>
            UF:
            <select name="estado" id="uf" required>
              <option value="selecione">Selecione...</option>
              <?php foreach ($estados as $sigla => $estado): ?>
                <option value="<?php echo $sigla; ?>"><?php echo $estado; ?></option>
              <?php endforeach; ?>
            </select>
          </label>
          <input type="text" name="rg_representante" placeholder="RG do representante">
          <input type="text" name="telefone_representante" placeholder="Telefone do representante">
          </div>
          <div>
            <label>
              Data de expedição: 
            </label>
            <input type="date">
            <input type="text" name="orgao_emissor" placeholder="Orgão emissor">
          </div>
            <div class="docs-idoso">
              <h2>Documentos necessários do representante</h2>
              <p>-Selecione a cópia digitalizada da sua carteira de identidate(ou documento equivalente).</p>
              <label for="rg-copia">Selecione(PNG, JPG)</label>
              <input type="file">
            </div>
        </div>
        <div class="btns">
          <button>
          <i class="fas fa-xmark"></i>
          Limpar
          </button>
          <button>
          <i class="fas fa-paper-plane"></i>
            Enviar
          </button>
        </div>
    </form>
  </div>
  <script src="../assets/js/exibirForm.js"></script>
  <?php 
    include ('../layout/footer.php');
  ?>
</body>
</html>