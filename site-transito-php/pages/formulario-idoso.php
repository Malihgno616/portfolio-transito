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
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
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
    <form action="../config/database/form-idoso-db.php" method="post" class="formulario-idoso animate__animated animate__fadeIn" enctype="multipart/form-data">
      <h2>Informações do idoso</h2>
        <div>
          <input type="text" name="nome-idoso" placeholder="Nome" required>
            <label>
              Data de nascimento:
            <input type="date" name="nascimento-idoso" required>
          </label>
          <label>Sexo:
            <select name="genero-idoso" id="genero" required>
              <option value="selecione">Selecione...</option>
              <?php foreach ($array_generos as $genero): ?>
                <option value="<?= $genero ?>"><?= $genero ?></option>
              <?php endforeach; ?>
            </select>
          </label>
        </div>
        <div>
          <input type="text" name="CEP-idoso" placeholder="CEP" maxlength="12" required>
          <input type="text" name="endereco-idoso" placeholder="Endereço (Rua, Av)" required>
          <input type="text" name="bairro-idoso" placeholder="Bairro" required>
        </div>
        <div>
          <input type="text" name="complemento-idoso" placeholder="Complemento" required>
          <input type="text" name="numero-idoso" placeholder="Número" required>
          <input type="text" name="cidade-idoso" placeholder="Cidade" required>
        </div>
        <div>
          <label>
            UF:
            <select name="estado-idoso" id="uf" required>
              <option value="selecione">Selecione...</option>
              <?php foreach ($estados as $sigla => $estado): ?>
                <option value="<?php echo $sigla; ?>"><?php echo $estado; ?></option>
              <?php endforeach; ?>
            </select>
          </label>
          <input type="text" name="telefone-idoso" placeholder="Número do telefone ou celular" required>
          <input type="text" name="rg-idoso" placeholder="RG" required>
        </div>
        <div>
          <label>
            Data de expedição:
            <input type="date" name="data-exp-idoso" required>
          </label>
          <input type="text" name="expedido-idoso" placeholder="Expedido por..." required>
          <input type="text" name="cnh-idoso" placeholder="Número da CNH(Caso for condutor)">
        </div>
        <div>
          <label>Validade da CNH: </label>
          <input type="date" name="validade-cnh-idoso" placeholder="Validade da CNH">
          <input type="email" name="email-idoso" placeholder="Digite seu email">
        </div>      
        <div class="docs-idoso">
          <h2>Documentos necessários</h2>
          <p>-Selecione a cópia digitalizada da sua carteira de identidate(ou documento equivalente).</p>
          <label for="rg-copia-idoso">Selecione(PNG, JPG)</label>
          <input type="file" name="rg-copia-idoso">
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
            <input type="text" name="nome-representante" placeholder="Nome do representante">
            <input type="text" name="email-representante" placeholder="E-mail do representante">
          </div>
          <div>
            <input type="text" name="cep-representante" placeholder="CEP do representante">
            <input type="text" name="endereco-representante"
            placeholder="Endereço do representante">
            <input type="text" name="complemento-representante"
            placeholder="Complemento do representante">    
          </div>
          <div>
            <input type="text" name="bairro-representante" placeholder="Bairro do representante">
            <input type="text" name="numero-representante" 
            placeholder="Número do representante">
            <input type="text" name="cidade-representante" placeholder="Cidade do representante">
          </div>
          <div>
            <label>
            UF:
            <select name="estado-representante" id="uf" required>
              <option value="selecione">Selecione...</option>
              <?php foreach ($estados as $sigla => $estado): ?>
                <option value="<?php echo $sigla; ?>"><?php echo $estado; ?></option>
              <?php endforeach; ?>
            </select>
          </label>
          <input type="text" name="rg-representante" placeholder="RG do representante">
          <input type="text" name="telefone-representante" placeholder="Telefone do representante">
          </div>
          <div>
            <label>
              Data de expedição: 
            </label>
            <input type="date" name="data-exp-representante">
            <input type="text" name="expedido-representante" placeholder="Orgão emissor">
          </div>
            <div class="docs-idoso">
              <h2>Documentos necessários do representante</h2>
              <p>-Selecione a cópia digitalizada da sua carteira de identidate(ou documento equivalente).</p>
              <label for="rg-copia">Selecione(PNG, JPG)</label>
              <input type="file" name="rg-copia-representante">
              <p>-No caso do representante legal, selecione a cópia digitalizada do documento comprovando que o requerente é representante da pessoa idosa.</p>
              <label for="compro">Selecione(PNG, JPG)</label>
              <input type="file" name="compro-representante">
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