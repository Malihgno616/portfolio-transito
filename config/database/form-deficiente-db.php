<?php 
  ini_set("default_charset", "utf8mb4");
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $db_server = "localhost";
  $db_user = "root";
  $db_password = "";
  $db_name = "site_transito";
  $conn = "";

  try {
    $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
    if (!$conn) {
      throw new Exception("Erro ao conectar ao banco de dados");
    }
    mysqli_set_charset($conn, "utf8mb4");
  } catch (Exception $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
  }
?>

<?php 
  // Dados do input do formulário do deficiente, incluso informações médicas
  $nome_beneficiario = $_POST["nome-beneficiario"];
  $nascimento_beneficiario = $_POST["nascimento-beneficiario"];
  $genero_beneficiario = $_POST["genero-beneficiario"];
  $endereco_beneficiario = $_POST["endereco-beneficiario"];
  $num_enredero_beneficiario = $_POST["num-endereco-beneficiario"];
  $complemento_beneficiario = $_POST["complemento-beneficiario"];
  $bairro_beneficiario = $_POST["bairro-beneficiario"];
  $cep_beneficiario = $_POST["cep-beneficiario"];
  $cidade_beneficiario = $_POST["cidade-beneficiario"];
  $uf_beneficiario = $_POST["uf-beneficiario"];
  $telefone_beneficiario = $_POST["telefone-beneficiario"];
  $rg_beneficiario = $_POST["rg-beneficiario"];
  $expedicao_beneficiario = $_POST["expedicao-beneficiario"];
  $expedido_beneficiario = $_POST["expedido-beneficiario"];
  $cnh_beneficiario = $_POST["cnh-beneficiario"] ?? null;
  $validade_cnh_beneficiario = $_POST["validade-cnh-beneficiario"] ?? null;
  $email_beneficiario = $_POST["email-beneficiario"] ?? null;

  if(isset($_FILES['copia-rg-beneficiario']['tmp_name']) && $_FILES['copia-rg-beneficiario']['tmp_name'] != "" ){
    $copia_rg_beneficiario = $_FILES['copia-rg-beneficiario']['tmp_name'];
    $tipos_permitidos = ['image/jpeg','image/png','image/pdf'];
    if(in_array(mime_content_type($copia_rg_beneficiario), $tipos_permitidos)){
      $imagem_rg_beneficiario = file_get_contents($copia_rg_beneficiario);
    } else {
      echo "Arquivo não permitido";
    }
  } else {
    echo "erro no upload do arquivo: " . $_FILES['copia-rg-beneficiario']['error'];
    exit;
  }

  $nome_representante = $_POST["nome-representante"] ?? null;
  $email_representante = $_POST["email-representante"] ?? null;
  $endereco_representante = $_POST["endereco-representante"] ?? null;
  $num_endereco_representante = $_POST["numero-representante"] ?? null;
  $complemento_representante = $_POST["complemento-representante"] ?? null;
  $bairro_representante = $_POST["bairro-representante"] ?? null;
  $cep_representante = $_POST["cep-representante"] ?? null;
  $cidade_representanta = $_POST["cidade-representante"] ?? null;
  $uf_representante = $_POST["uf-representante"] ?? null;
  $tel_representante = $_POST["telefone-representante"] ?? null;
  $rg_representante = $_POST["rg-representante"] ?? null;
  $expedicao_representante = $_POST["expedicao-representante"] ?? null;
  $expedido_representante = $_POST["expedido-representante"] ?? null;

  if(isset($_FILES['copia-rg-representante']['tmp_name']) && $_FILES['copia-rg-representante']['tmp_name'] != ""){
    $copia_rg_representante = $_FILES['copia-rg-representante']['tmp_name'];
    $tipos_permitidos = ['image/jpeg', 'image/png', 'image/pdf'];
    if(in_array(mime_content_type($copia_rg_representante), $tipos_permitidos)){
      $imagem_rg_representante = file_get_contents($copia_rg_representante);
    } else {
      echo "Arquivo não permitido";
    }
  } else {
    echo "erro no upload do arquivo: " . $_FILES['copia-rg-representante']['error'];
    exit;
  }

  if(isset($_FILES['comprovante-representante']['tmp_name']) && $_FILES['comprovante-representante']['tmp_name'] != ""){
  $comprovante_representante = $_FILES['comprovante-representante']['tmp_name'];
  $tipos_permitidos = ['image/jpeg', 'image/png', 'image/pdf'];
  if(in_array(mime_content_type($comprovante_representante), $tipos_permitidos)){
    $imagem_comp_representante = file_get_contents($comprovante_representante);
    } else {
      echo "Arquivo não permitido";
    }
  } else {
    echo "erro no upload do arquivo: " . $_FILES['comprovante-representante']['error'];
    exit;
  }

  $nome_medico = $_POST["nome-medico"];
  $crm_medico = $_POST["crm-medico"];
  $telefone_medico = $_POST["telefone-medico"];
  $endereco_medico = $_POST["endereco-medico"];
  
  if (isset($_POST['deficiencia-ambulatoria'])) {    
      $deficiencias = $_POST['deficiencia-ambulatoria']; 
      $deficiencias_str = implode(", ", $deficiencias);
  } else {
      $deficiencias_str = ''; 
  }

  if (isset($_POST['validade'])) {
    $validade = $_POST['validade']; // "temporário" ou "permanente"
  } else {
      $validade = ''; 
  }

  $data_inicio = $_POST["data-inicio"];
  $data_fim = $_POST["data-fim"] ?? null;
  $descricao_cid = $_POST["descricao-cid"];

  if(isset($_FILES['atestado-medico']['tmp_name']) && $_FILES['atestado-medico']['tmp_name'] != ""){
  $atestado_medico = $_FILES['atestado-medico']['tmp_name'];
  $tipos_permitidos = ['image/jpeg', 'image/png', 'image/pdf'];
  if(in_array(mime_content_type($comprovante_representante), $tipos_permitidos)){
    $imagem_atestado = file_get_contents($atestado_medico);
    } else {
      echo "Arquivo não permitido";
    }
  } else {
    echo "erro no upload do arquivo: " . $_FILES['copia-rg-representante']['error'];
    exit;
  }

?>

<?php 
// Inserir dados no banco de dados
$query = "INSERT INTO cartao_deficiente (nome_beneficiario, genero_beneficiario, endereco_beneficiario, numero_endereco_beneficiario, complemento_beneficiario, bairro_beneficiario, cep_beneficiario, cidade_beneficiario, uf_beneficiario, telefone_beneficiario, rg_beneficiario, expedicao_beneficiario, expedido_beneficiario, cnh_beneficiario, validade_cnh_beneficiario, email_beneficiario, copia_rg_beneficiario, nome_representante, email_representante, endereco_representante, numero_endereco_representante, bairro_representante, cep_representante, uf_representante, telefone_representante, rg_representante, expedicao_representante, expedido_representante, copia_rg_representante, comprovante_representante, nome_medico, registro_profissional_medico, telefone_medico, endereco_medico, deficiencia_ambulatoria, restricao_medica, data_inicio, data_fim, descricao_cid, atestado_medico) VALUES (
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
)";

$stmt = mysqli_prepare($conn, $qeury);

if ($stmt === false) {
  echo "Erro ao preparar a consulta: " . mysqli_error($conn);
  exit;
}

mysqli_stmt_bind_param($stmt, "ssssssssssssssssbssssssssssssbbsssssssssb",
$nome_beneficiario, 
$genero_beneficiario, 
$endereco_beneficiario, 
$num_enredero_beneficiario, 
$complemento_beneficiario, 
$bairro_beneficiario, 
$cep_beneficiario, 
$cidade_beneficiario, 
$uf_beneficiario, 
$telefone_beneficiario, 
$rg_beneficiario, 
$expedicao_beneficiario, 
$expedido_beneficiario, 
$cnh_beneficiario, 
$validade_cnh_beneficiario, 
$email_beneficiario, 
$imagem_rg_beneficiario, 
$nome_representante, 
$email_representante, 
$endereco_representante, 
$num_endereco_representante, 
$bairro_representante, 
$cep_representante, 
$cidade_representanta, 
$uf_representante, 
$tel_representante, 
$rg_representante, 
$expedicao_representante, 
$expedido_representante, 
$imagem_rg_representante, 
$imagem_comp_representante, 
$nome_medico, 
$crm_medico, 
$telefone_medico, 
$endereco_medico, 
$deficiencias_str, 
$validade, 
$data_inicio, 
$data_fim, 
$descricao_cid, 
$imagem_atestado);

if(isset($imagem_rg_beneficiario)){
  mysqli_stmt_send_long_data($stmt, 16, $imagem_rg_beneficiario);
}

if(isset($imagem_rg_representante)){
  mysqli_stmt_send_long_data($stmt, 29, $imagem_rg_representante);
}

if(isset($imagem_comp_representante)){
  mysqli_stmt_send_long_data($stmt, 30, $imagem_comp_representante);
}

if(isset($imagem_atestado)){
  mysqli_stmt_send_long_data($stmt, 40, $imagem_atestado);
}

$executed = mysqli_stmt_execute($stmt);

if($executed) {
  $mensagem = "Dados enviados com sucesso!";
} else {
  $mensagem = "Erro ao enviar dados!" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enviado</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;
    }
    div {
      width: 500px;
      height: 200px;
      background-color: #f0f0f0;
      margin: 225px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    p {
      font-size: 2.1rem;
      text-align: center;
      margin-bottom: 1rem;
    }
    a {
      text-decoration: none;
      color: #f0f0f0;
      background-color: rgb(255, 73, 73);
      padding: .5rem;
      font-size: 1.25rem;
      border-radius: 10rem;
      transition: all .5s ease;
    }
    a:hover {
      filter: brightness(1.1);
    }
    @media(max-width: 480px){
      div {
        width: 100%;
      }
      p {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div>
    <p><?php echo $mensagem; ?></p>
    <a href="../../public/index.php">Clique para voltar à página principal</a>
  </div>
</body>
</html>