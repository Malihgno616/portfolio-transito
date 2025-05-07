<?php 
  session_start();
  
  require('conn.php');

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
  $rg_representante = !empty($_POST['rg-representante']) ? $_POST['rg-representante'] : null;
  $expedicao_representante = $_POST["expedicao-representante"] ?? null;
  if ($expedicao_representante === '') {
    $expedicao_representante = null;
  }
  $expedido_representante = $_POST["expedido-representante"] ?? null;

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
 
   $required = [
    'nome-idoso', 'nascimento-idoso', 'genero-idoso', 
    'endereco-idoso', 'numero-endereco-idoso', 'bairro-idoso',
    'cep-idoso', 'cidade-idoso', 'uf-idoso', 'telefone-idoso',
    'rg-idoso', 'data-expedicao-idoso', 'expedido-idoso'
    ];

  $error_array = [];
  foreach ($required as $campo) {
    if (empty($_POST[$campo])) {
      $error_array[$campo] = "Este campo é obrigatório, preencha este campo";
    }
  }

  if (!empty($error_array)) {
    $_SESSION['erro'] = $error_array;
    $_SESSION['erro-form-idoso'] = "Por favor, preencha todos os campos obrigatórios.";
    header("Location: ../../pages/formulario-idoso.php");
    exit();
  }

  $conn = new Conn();
  $pdo = $conn->connect();

  try {
    $query = "INSERT INTO cartao_idoso (
        nome_idoso, nascimento_idoso, genero_idoso, endereco_idoso, numero_endereco_idoso, 
        complemento_idoso, bairro_idoso, cep_idoso, cidade_idoso, uf_idoso, telefone_idoso, 
        rg_idoso, data_expedicao_idoso, expedido_idoso, cnh_idoso, validade_cnh_idoso, 
        email_idoso, copia_rg_idoso, nome_representante, email_representante, 
        endereco_representante, numero_endereco_representante, complemento_representante, 
        bairro_representante, cep_representante, cidade_representante, uf_representante, 
        telefone_representante, rg_representante, data_expedicao_representante, 
        expedido_representante, copia_rg_representante, comprovante_representante
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($query);

    $stmt->bindValue(1,  $nome_idoso, PDO::PARAM_STR);
    $stmt->bindValue(2,  $nascimento_idoso, PDO::PARAM_STR);
    $stmt->bindValue(3,  $genero_idoso, PDO::PARAM_STR);
    $stmt->bindValue(4,  $endereco_idoso, PDO::PARAM_STR);
    $stmt->bindValue(5,  $num_endereco_idoso, PDO::PARAM_STR);
    $stmt->bindValue(6,  $complemento_idoso, PDO::PARAM_STR);
    $stmt->bindValue(7,  $bairro_idoso, PDO::PARAM_STR);
    $stmt->bindValue(8,  $cep_idoso, PDO::PARAM_STR);
    $stmt->bindValue(9,  $cidade_idoso, PDO::PARAM_STR);
    $stmt->bindValue(10, $uf_idoso, PDO::PARAM_STR);
    $stmt->bindValue(11, $tel_idoso, PDO::PARAM_STR);
    $stmt->bindValue(12, $rg_idoso, PDO::PARAM_STR);
    $stmt->bindValue(13, $expedicao_idoso, PDO::PARAM_STR);
    $stmt->bindValue(14, $expedido_idoso, PDO::PARAM_STR);
    $stmt->bindValue(15, $cnh_idoso, PDO::PARAM_STR);
    $stmt->bindValue(16, $validade_cnh_idoso, PDO::PARAM_STR);
    $stmt->bindValue(17, $email_idoso, PDO::PARAM_STR);
    $stmt->bindValue(18, $imagem_idoso, PDO::PARAM_LOB); // binário
    $stmt->bindValue(19, $nome_representante, PDO::PARAM_STR);
    $stmt->bindValue(20, $email_representante, PDO::PARAM_STR);
    $stmt->bindValue(21, $endereco_representante, PDO::PARAM_STR);
    $stmt->bindValue(22, $num_endereco_representante, PDO::PARAM_STR);
    $stmt->bindValue(23, $complemento_representante, PDO::PARAM_STR);
    $stmt->bindValue(24, $bairro_representante, PDO::PARAM_STR);
    $stmt->bindValue(25, $cep_representante, PDO::PARAM_STR);
    $stmt->bindValue(26, $cidade_representante, PDO::PARAM_STR);
    $stmt->bindValue(27, $uf_representante, PDO::PARAM_STR);
    $stmt->bindValue(28, $tel_representante, PDO::PARAM_STR);
    $stmt->bindValue(29, $rg_representante, PDO::PARAM_STR);
    $stmt->bindValue(30, $expedicao_representante, PDO::PARAM_STR);
    $stmt->bindValue(31, $expedido_representante, PDO::PARAM_STR);
    $stmt->bindValue(32, $imagem_rg_representante, PDO::PARAM_LOB); // binário
    $stmt->bindValue(33, $imagem_comp_representante, PDO::PARAM_LOB); // binário

    $executed = $stmt->execute();

    if ($executed) {
        $_SESSION['success'] = "Informações enviadas com sucesso";
        header("Location: ../../pages/formulario-idoso.php");
        exit();
    } else {
        $_SESSION['error-sql'] = "Erro ao inserir no banco de dados.";
    }

  } catch (PDOException $e) {
      $_SESSION['error-sql'] = "Erro de banco de dados: " . $e->getMessage();
      // Você pode também fazer um log aqui   
  }
