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
  // Dados do formulário
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
  
  // Verificação do upload do arquivo
  if (isset($_FILES['copia-rg-idoso']) && $_FILES['copia-rg-idoso']['error'] == 0) {
    $copia_rg_idoso = $_FILES['copia-rg-idoso'];
    $tipos_permitidos = ['image/jpeg', 'image/png'];

    if (in_array($copia_rg_idoso['type'], $tipos_permitidos)) {
        // Verifica o tamanho da imagem antes de processá-la
        $tamanho_maximo = 16 * 1024 * 1024; // 16 MB
        if ($copia_rg_idoso['size'] > $tamanho_maximo) {
            echo "O arquivo é muito grande. O tamanho máximo permitido é 16 MB.";
            exit;
        }
        $imagem = file_get_contents($copia_rg_idoso['tmp_name']);
    } else {
        echo "Tipo de arquivo não permitido";
        exit;
    }
  } else {
      echo "Erro no upload do arquivo: " . $_FILES['copia-rg-idoso']['error'];
      exit;
  }

?>

<?php 
  // Query de inserção no banco de dados
  $query = "INSERT INTO cartao_idoso (nome_idoso, nascimento_idoso, genero_idoso, endereco_idoso, numero_endereco_idoso, complemento_idoso, bairro_idoso, cep_idoso, cidade_idoso, uf_idoso, telefone_idoso, rg_idoso, data_expedicao_idoso, expedido_idoso, cnh_idoso, validade_cnh_idoso, email_idoso, copia_rg_idoso) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

  $stmt = mysqli_prepare($conn, $query);

  if($stmt === false){
    echo "Erro ao preparar a consulta: " . mysqli_error($conn);
    exit;
  }

  // Vincula os parâmetros corretamente, incluindo o parâmetro binário para a imagem
  mysqli_stmt_bind_param($stmt, "sssssssssssssssssb", 
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
                         $imagem); 

  // Executa a consulta e verifica se houve sucesso
  $executed = mysqli_stmt_execute($stmt);

  if ($executed) {
    $mensagem = "Dados enviados com sucesso!";
  } else {
    $mensagem = "Erro ao enviar dados: " . mysqli_error($conn);
  }
  
  // Fecha a conexão e o statement
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
