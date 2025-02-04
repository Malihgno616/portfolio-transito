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

  // Dados do beneficiario
  $nome_beneficiario = $_POST['nome-beneficiario'];
  $nasc_beneficiario = $_POST['nascimento-beneficiario'];
  $genero_beneficiario = $_POST['genero-beneficiario'];
  $endereco_beneficiario = $_POST['endereco-beneficiario'];
  $numero_beneficiario = $_POST['numero-beneficiario'];
  $complemento_beneficiario = $_POST['complemento-beneficiario'] ?? null;
  $bairro_beneficiario = $_POST['bairro-beneficiario'];
  $cep_beneficiario = $_POST['cep-beneficiario'];
  $cidade_beneficiario = $_POST['cidade-beneficiario'];
  $uf_beneficiario  = $_POST['uf-beneficiario'];
  $tel_beneficiario = $_POST['telefone-beneficiario'];
  $rg_beneficiario = $_POST['rg-beneficiario'];
  $expedicao_beneficiario = $_POST['expedicao-beneficiario'];
  $expedido_beneficiario = $_POST['expedido-beneficiario'];
  $cnh_beneficiario = $_POST['cnh-beneficiario'] ?? null;
  $validade_cnh_beneficiario = isset($_POST['validade-cnh-beneficiario']) && $_POST['validade-cnh-beneficiario'] !== '' ? $_POST['validade-cnh-beneficiario'] : null;
  $email_beneficiairo = $_POST['email-beneficiario'] ?? null;

  // imagem do rg do beneficiario
  if (isset($_FILES['copia-rg-beneficiario']['tmp_name']) && $_FILES['copia-rg-beneficiario']['error'] != ""){
    $copia_rg_beneficiario = $_FILES['copia-rg-beneficiario']['tmp_name'];
    $tipos_permitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    if(in_array(mime_content_type($copia_rg_beneficiario), $tipos_permitidos)){
      $img_rg_beneficiario = file_get_contents($copia_rg_beneficiario);
    } else {
      echo "Arquivo não permitido";
      exit;
    }
  } else {
    echo "Erro ao enviar a cópia do rg do beneficiário: " . $_FILES['copia-rg-beneficiario']['error'];
    exit;
  }

  $nome_medico = $_POST['nome-medico'];
  $crm_medico = $_POST['crm-medico'];
  $telefone_medico = $_POST['telefone-medico'];
  $local_atendimento_medico = $_POST['local-atendimento-medico'];
  $deficiencia_ambulatoria = implode(", ", $_POST['deficiencia-ambulatoria']);
  $restricao_medica = $_POST['restricao-medica'];
  $data_inicio = $_POST['data-inicio'];
  $data_fim = ($_POST['data-fim'] ?? null);
  if ($data_fim === '') {
    $data_fim = null;
  }
  $cid = $_POST['cid'];

  // imagem do atestado médico
  if (isset($_FILES['atestado-medico']['tmp_name']) && $_FILES['atestado-medico']['error'] != ""){
    $atestado_medico = $_FILES['atestado-medico']['tmp_name'];
    $tipos_permitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    if(in_array(mime_content_type($atestado_medico), $tipos_permitidos)){
      $img_atestado_medico = file_get_contents($atestado_medico);

    } else {
      echo "Arquivo não permitido";
      exit;
    }
  } else {
    echo "Erro ao enviar o atestado médico: " . $_FILES['atestado-medico']['error'];
    exit;
  }

?>

<?php 
    
  // Envio dos dados
  $query = "INSERT INTO cartao_deficiente (nome_beneficiario, nasc_beneficiario, genero_beneficiario, endereco_beneficiario, numero_beneficiario, complemento_beneficiario, bairro_beneficiario, cep_beneficiario, cidade_beneficiario, uf_beneficiario, telefone_beneficiario, rg_beneficiario, expedicao_beneficiario, expedido_beneficiario, cnh_beneficiario, validade_cnh_beneficiario, email_beneficiario, copia_rg_beneficiario, nome_medico, crm, telefone_medico, local_atendimento_medico, deficiencia_ambulatoria, periodo_restricao_medica, data_inicio, data_fim, cid, atestado_medico) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";  

  $stmt = mysqli_prepare($conn, $query);
  if ($stmt === false) {
    echo "Erro ao preparar a consulta: " . mysqli_error($conn);
    exit;
  }

  mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssssssssbssssssssssb", 
    $nome_beneficiario,
    $nasc_beneficiario,
    $genero_beneficiario,
    $endereco_beneficiario,
    $numero_beneficiario,
    $complemento_beneficiario,
    $bairro_beneficiario,
    $cep_beneficiario,
    $cidade_beneficiario,
    $uf_beneficiario,
    $tel_beneficiario, 
    $rg_beneficiario,
    $expedicao_beneficiario,
    $expedido_beneficiario,
    $cnh_beneficiario,
    $validade_cnh_beneficiario,
    $email_beneficiario, 
    $img_rg_beneficiario, 
    $nome_medico,
    $crm_medico,
    $telefone_medico,
    $local_atendimento_medico,
    $deficiencia_ambulatoria,
    $restricao_medica, 
    $data_inicio,
    $data_fim,
    $cid,
    $img_atestado_medico 
  );

    if(isset($img_rg_beneficiario)){
      mysqli_stmt_send_long_data($stmt, 17, $img_rg_beneficiario);
    }

    if(isset($img_atestado_medico)){
      mysqli_stmt_send_long_data($stmt, 27, $img_atestado_medico);
    }

    $executed = mysqli_stmt_execute($stmt);

    if ($executed) {
      $mensagem = "Dados enviados com sucesso!";
    } else {
      $mensagem = "Erro ao enviar dados: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
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
    <p><?= $mensagem; ?></p>
    <a href="../../public/index.php">Clique para voltar à página principal</a>
  </div>
</body>
</html>