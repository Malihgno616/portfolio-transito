<?php 
  session_start();

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  
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
      $_SESSION['err-fields'] = $error_array;
      $_SESSION['erro-form-idoso'] = "Por favor, preencha todos os campos obrigatórios.";
      header("Location: ../../pages/formulario-idoso.php");
      exit();
    }

  if (isset($_FILES['copia-rg-idoso']) && $_FILES['copia-rg-idoso']['error'] === 0 && $_FILES['copia-rg-idoso']['tmp_name'] !== '') {
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

  $nome_arquivo_rg_idoso = $_POST['nome-arquivo-rg-idoso']; 

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

  $nome_arquivo_rg_rep = $_POST['nome-arquivo-rg-rep'];

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
  
  $nome_arquivo_comp_rep = $_POST['nome-arquivo-comp-rep'];

  $conn = new Conn();
  $pdo = $conn->connect();

  try {
    $query = "INSERT INTO cartao_idoso (
        nome_idoso, nascimento_idoso, genero_idoso, endereco_idoso, numero_endereco_idoso, 
        complemento_idoso, bairro_idoso, cep_idoso, cidade_idoso, uf_idoso, telefone_idoso, 
        rg_idoso, data_expedicao_idoso, expedido_idoso, cnh_idoso, validade_cnh_idoso, 
        email_idoso, copia_rg_idoso, nome_arquivo_rg_idoso, nome_representante, email_representante, 
        endereco_representante, numero_endereco_representante, complemento_representante, 
        bairro_representante, cep_representante, cidade_representante, uf_representante, 
        telefone_representante, rg_representante, data_expedicao_representante, 
        expedido_representante, copia_rg_representante, nome_arquivo_rg_rep, 
        comprovante_representante, nome_arquivo_comp_rep 
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($query);
    $data = [
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
      $imagem_idoso,
      $nome_arquivo_rg_idoso,
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
      $nome_arquivo_rg_rep,
      $imagem_comp_representante,
      $nome_arquivo_comp_rep
  ];

  $lob_indices = [17, 32, 34];

  foreach ($data as $index => $value) {
      $param_type = in_array($index, $lob_indices) ? PDO::PARAM_LOB : PDO::PARAM_STR;
      $stmt->bindValue($index + 1, $value, $param_type); 
  }

  $executed = $stmt->execute();

    if ($executed) {
        $_SESSION['success-form-idoso'] = "Informações enviadas com sucesso";
        header("Location: ../../pages/formulario-idoso.php");
        exit();
    } else {
      $_SESSION['erro-form-idoso'] = "Erro ao enviar informações";
    }

  } catch (PDOException $e) {
      echo $_SESSION['error-sql'] = "Erro do banco de dados: " . $e->getMessage();
      // Você pode também fazer um log aqui   

  }
