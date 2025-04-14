<?php 

  session_start();

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

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Acesso inválido.");
  }

  $required = [
    'nome-idoso', 'nascimento-idoso', 'genero-idoso', 
    'endereco-idoso', 'numero-endereco-idoso', 'bairro-idoso',
    'cep-idoso', 'cidade-idoso', 'uf-idoso', 'telefone-idoso',
    'rg-idoso', 'data-expedicao-idoso', 'expedido-idoso'
  ];

  foreach ($required as $field) {
      if (empty($_POST[$field])) {
          die("Erro: O campo '$field' obrigatorio.");
      }
  }

?>

<?php 
  // Dados do idoso
  $nome_idoso = $_POST["nome-idoso"];
  $nascimento_idoso = $_POST["nascimento-idoso"];
  $genero_idoso = $_POST["genero-idoso"];
  $endereco_idoso = $_POST["endereco-idoso"];
  $num_endereco_idoso = $_POST["numero-endereco-idoso"];
  $complemento_idoso = $_POST["complemento-idoso"] ?? null;
  $bairro_idoso = $_POST["bairro-idoso"];
  $cep_idoso = $_POST["cep-idoso"];
  $cidade_idoso = $_POST["cidade-idoso"];
  $uf_idoso = $_POST["uf-idoso"];
  $tel_idoso = $_POST["telefone-idoso"];
  $rg_idoso = $_POST["rg-idoso"];
  $expedicao_idoso = $_POST["data-expedicao-idoso"];
  $expedido_idoso = $_POST["expedido-idoso"];
  $cnh_idoso = $_POST["cnh-idoso"] ?? null;
  $validade_cnh_idoso = isset($_POST['validade-cnh-idoso']) && $_POST['validade-cnh-idoso'] !== '' ? $_POST['validade-cnh-idoso'] : null;
  $email_idoso = $_POST["email-idoso"] ?? null;
   
  if (isset($_FILES['copia-rg-idoso']) && $_FILES['copia-rg-idoso']['error'] != "") {
    $copia_rg_idoso = $_FILES['copia-rg-idoso']['tmp_name'];
    $tipos_permitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    if (in_array(mime_content_type($copia_rg_idoso), $tipos_permitidos)) {
        $imagem_idoso = file_get_contents($copia_rg_idoso); 
    } else {
        echo "Arquivo não permitido";
        exit;
    }
  } else {
      echo "Erro no envio do arquivo da cópia do rg do idoso: " . $_FILES['copia-rg-idoso']['error'];
      exit;
  } 

  // Dados do representante
  $nome_representante = $_POST["nome-representante"] ?? null;
  $email_representante = $_POST["email-representante"] ?? null;
  $endereco_representante = $_POST["endereco-representante"] ?? null;
  $num_endereco_representante = $_POST["numero-endereco-representante"] ?? null;
  $complemento_representante = $_POST["complemento-representante"] ?? null;
  $bairro_representante = $_POST["bairro-representante"] ?? null;
  $cep_representante = $_POST["cep-representante"] ?? null;
  $cidade_representante = $_POST["cidade-representante"] ?? null;
  $uf_representante = $_POST["uf-representante"] ?? null;
  if ($uf_representante === 'selecione' || $uf_representante === '') {
    $uf_representante = null; 
  }
  $tel_representante = $_POST["telefone-representante"] ?? null;
  $rg_representante = $_POST["rg-representante"] ?? null;
  $expedicao_representante = $_POST["expedicao-representante"] ?? null;
  if ($expedicao_representante === '') {
    $expedicao_representante = null;
  }
  $expedido_representante = $_POST["expedido-representante"] ?? null;

  /* Imagem do RG do representante */
  /* Erro corrigido */
  if (isset($_FILES['copia-rg-representante']) && $_FILES['copia-rg-representante']['error'] == 0) {
      $copia_rg_representante = $_FILES['copia-rg-representante']['tmp_name'];
      $tipos_permitidos = ['image/jpeg', 'image/png', 'application/pdf']; // 
      if (in_array(mime_content_type($copia_rg_representante), $tipos_permitidos)) {
          $imagem_rg_representante = file_get_contents($copia_rg_representante);
      } else {
          echo "Arquivo não permitido. Somente imagens JPEG, PNG e PDF são aceitas.";
          exit;
      }
    } elseif (empty($_FILES['copia-rg-representante']['name'])) {
        $imagem_rg_representante = null;
    } else {
        echo "Erro no envio do arquivo da cópia do RG do idoso: " . $_FILES['copia-rg-representante']['error'];
        exit;
    }   

  /* Imagem do comprovante de representante */
  /* Erro corrigido */
  if (isset($_FILES['comprovante-representante']) && $_FILES['comprovante-representante']['error'] == 0) {
    $comprovante_representante = $_FILES['comprovante-representante']['tmp_name'];
    $tipos_permitidos = ['image/jpeg', 'image/png', 'application/pdf'];
    if (in_array(mime_content_type($comprovante_representante), $tipos_permitidos)) {
        $imagem_comp_representante = file_get_contents($comprovante_representante); 
    } else {
        echo "Arquivo não permitido";
        exit;
    }
  } elseif (empty($_FILES['comprovante-representante']['name'])) {
        $comprovante_representante = null;
  } else {
      echo "Erro no envio do arquivo da cópia do rg do idoso: " . $_FILES['comprovante-representante']['error'];
      exit;
  }

?>

<?php 
  $query = "INSERT INTO cartao_idoso (nome_idoso, nascimento_idoso, genero_idoso, endereco_idoso, numero_endereco_idoso, complemento_idoso, bairro_idoso, cep_idoso, cidade_idoso, uf_idoso, telefone_idoso, rg_idoso, data_expedicao_idoso, expedido_idoso, cnh_idoso, validade_cnh_idoso, email_idoso, copia_rg_idoso, nome_representante, email_representante, endereco_representante, numero_endereco_representante, complemento_representante, bairro_representante, cep_representante, cidade_representante, uf_representante, telefone_representante, rg_representante, data_expedicao_representante, expedido_representante, copia_rg_representante, comprovante_representante) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  $stmt = mysqli_prepare($conn, $query);

  if ($stmt === false) {
      echo "Erro ao preparar a consulta: " . mysqli_error($conn);
      exit;
  } 

  // Bind parameters
  mysqli_stmt_bind_param($stmt, "sssssssssssssssssbsssssssssssssbb", 
      $nome_idoso, 
      $nascimento_idoso,
      $genero_idoso,
      $endereco_idoso,
      $num_endereco_idoso,
      $complemento_idoso, 
      $bairro_idoso, 
      $cep_idoso, 
      $cidade_idoso,  
      $uf_idoso,
      $tel_idoso,
      $rg_idoso,
      $expedicao_idoso,
      $expedido_idoso,
      $cnh_idoso,
      $validade_cnh_idoso,
      $email_idoso,
      $imagem_idoso,   // Arquivo lido em binário
      $nome_representante,
      $email_representante,
      $endereco_representante,
      $num_endereco_representante,
      $complemento_representante,
      $bairro_representante,
      $cep_representante,
      $cidade_representante,
      $uf_representante,
      $tel_representante,
      $rg_representante,
      $expedicao_representante,
      $expedido_representante,
      $imagem_rg_representante,
      $imagem_comp_representante
  ); 

  // Enviar dados binários
  if (isset($imagem_idoso)) {
      mysqli_stmt_send_long_data($stmt, 17, $imagem_idoso); 
  }

  if (isset($imagem_rg_representante)) {
      mysqli_stmt_send_long_data($stmt, 31, $imagem_rg_representante); 
  }

  if (isset($imagem_comp_representante)) {
      mysqli_stmt_send_long_data($stmt, 32, $imagem_comp_representante); 
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
  <title>Enviado</title>
  <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
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
