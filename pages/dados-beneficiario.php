<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "site_transito";
$conn = "";

try {
  $conn = mysqli_connect(
    $db_server,
    $db_user,
    $db_password,
    $db_name
  );
  
  if (!$conn) {
    throw new Exception("Erro ao conectar com o banco de dados!");
  }
  
  mysqli_set_charset($conn, "utf8mb4");

} catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

$rg_beneficiario = $_POST["rg-beneficiario"];
// print_r($rg_beneficiario);

$query_select = "SELECT * FROM cartao_deficiente where rg_beneficiario = '$rg_beneficiario'";

$result = mysqli_query($conn, $query_select);

// Verificando se há resultados
if (mysqli_num_rows($result) > 0) {
  // Pega a linha de dados
  $beneficiario = mysqli_fetch_assoc($result);
} else {
  echo "Nenhum beneficiário encontrado com esse RG.";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados do Beneficiario</title>
  <?php include_once('../layout/head-dados-bene.php');?>
</head>
<body>
  <?php 
    include_once('../layout/header.php');
  ?> 
  <div class="dados-beneficiario animate__animated animate__fadeIn">
    <h1>Informações do Beneficiário</h1>

    <?php 
    if (isset($beneficiario)) {

      echo "<p><strong>Nome do beneficiário:</strong> " . htmlspecialchars($beneficiario['nome_beneficiario']) . "</p>";

      echo "<p><strong>Data de nascimento: </strong> " . date('d/m/Y', strtotime(htmlspecialchars($beneficiario['nasc_beneficiario']))) . "</p>";

      echo "<p><strong>Sexo: </strong>" . htmlspecialchars($beneficiario['genero_beneficiario']) . "</p>";
      
      echo "<p><strong>Endereço: </strong> " . htmlspecialchars($beneficiario['endereco_beneficiario']) . "</p>";
      
      echo "<p><strong>Numero: </strong>". htmlspecialchars($beneficiario['numero_beneficiario']) ."</p>";

      echo "<p><strong>Complemento: </strong>" . (!empty($beneficiario['complemento_beneficiario']) ? htmlspecialchars($beneficiario['complemento_beneficiario']) : 'Não informado') . "</p>";
     
      echo "<p><strong>Bairro: </strong>" . htmlspecialchars($beneficiario['bairro_beneficiario']) . "</p>";
      
      echo "<p><strong>CEP: </strong>" . htmlspecialchars($beneficiario['cep_beneficiario']) . "</p>";

      echo "<p><strong>UF(Unidade Federal): </strong>". htmlspecialchars($beneficiario['uf_beneficiario']) ."</p>";
      
      echo "<p><strong>Telefone: </strong>" . (!empty($beneficiario['email_beneficiario']) ? htmlspecialchars($beneficiario['email_beneficiario']) : 'Não informado') . "</p>";

      echo "<p><strong>RG:</strong> " . htmlspecialchars($beneficiario['rg_beneficiario']) . "</p>";    
      
      echo "<p><strong>Data de expedição: </strong> " . date('d/m/Y', strtotime(htmlspecialchars($beneficiario['expedicao_beneficiario']))) . "</p>";

      echo "<p><strong>Expedido por: </strong>". htmlspecialchars($beneficiario['expedido_beneficiario']) ."</p>";

      echo "<p><strong>CNH(Caso for condutor): </strong>" . (!empty($beneficiario['cnh_beneficiario']) ? htmlspecialchars($beneficiario['cnh_beneficiario']) : 'Não informado') . "</p>";
      
      echo "<p><strong>Validade da CNH: </strong> " . (!empty($beneficiario['validade_cnh_beneficiario']) ? date('d/m/Y', strtotime(htmlspecialchars($beneficiario['validade_cnh_beneficiario']))) : 'Não informado') . "</p>";

      echo "<p><strong>Email: </strong>" . (!empty($beneficiario['email_beneficiario']) ? htmlspecialchars($beneficiario['email_beneficiario']) : 'Não informado') . "</p>";

      echo "<p><strong>Nome do médico: </strong>". htmlspecialchars($beneficiario['nome_medico']) ."</p>";

      echo "<p><strong>Registro Profissional(CRM): </strong>". htmlspecialchars($beneficiario['crm']) ."</p>";

      echo "<p><strong>Local de Atendimento: </strong>". htmlspecialchars($beneficiario['local_atendimento_medico']) ."</p>";

      echo "<p><strong>Deficiência(s) Ambulatória(s): </strong>". htmlspecialchars($beneficiario['deficiencia_ambulatoria']) ."</p>";

      echo "<p><strong>Período Restrição Médica: </strong>". htmlspecialchars($beneficiario['periodo_restricao_medica']) ."</p>";

      echo "<p><strong>Data de Início</strong>: " . date('d/m/Y', strtotime(htmlspecialchars($beneficiario['data_inicio']))) . "</p>";

      echo "<p><strong>Data de Fim: </strong> " . (!empty($beneficiario['data_fim']) ? date('d/m/Y', strtotime(htmlspecialchars($beneficiario['data_fim']))) : 'Não informado') . "</p>";

      echo "<p><strong>Descrição CID: </strong>". htmlspecialchars($beneficiario['cid']) ."</p>";        

    } else {
      echo "<p class='alerta'>Nenhum beneficiário encontrado com esse RG.</p>";
    }
    ?>
  </div>
  

  <?php     
    include_once('../layout/footer.php');
  ?>
</body>
</html>