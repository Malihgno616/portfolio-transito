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

  $required = ['nome-beneficiario','nascimento-beneficiario','genero-beneficiario','endereco-beneficiario','numero-beneficiario','bairro-beneficiario','cep-beneficiario','cidade-beneficiario','uf-beneficiario','telefone-beneficiario','rg-beneficiario','expedicao-beneficiario','expedido-beneficiario','nome-medico','crm-medico','telefone-medico','local-atendimento-medico','cid'];

  $error_array = [];
  foreach ($required as $campo) {
    if (empty($_POST[$campo])) {
      $error_array[$campo] = "Este campo é obrigatório, preencha este campo";
    }
  }

  if (!empty($error_array)) {
    $_SESSION['error'] = $error_array;
    $_SESSION['error-form-deficiente'] = "Por favor, preencha todos os campos obrigatórios.";
    header("Location: ../../pages/form-deficiente.php");
    exit();
  }

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
  $email_beneficiario = $_POST['email-beneficiario'] ?? null;

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

  // Dados do representante
  $nome_representante = $_POST['nome-representante'] ?? null;
  $email_representante = $_POST['email-representante'] ?? null;
  $endereco_representante = $_POST['endereco-representante'] ?? null;
  $num_representante = $_POST['numero-representante'] ?? null;
  $complemento_representante = $_POST['complemento-representante'] ?? null;
  $bairro_representante = $_POST['bairro-representante'] ?? null;
  $cep_representante = $_POST['cep-representante'] ?? null;
  $cidade_representante = $_POST['cidade-representante'] ?? null;
  $uf_representante = $_POST['uf-representante'] ?? null;
  if ($uf_representante === 'selecione' || $uf_representante === '') {
    $uf_representante = null; 
  }
  $tel_representante = $_POST['telefone-representante'] ?? null;
  $rg_representante = !empty($_POST['rg-representante']) ? $_POST['rg-representante'] : null;
  $expedicao_representante = $_POST['expedicao-representante'] ?? null;
  if($expedicao_representante === '' ){
    $expedicao_representante = null;
  }
  $expedido_representante = $_POST['expedido-representante'] ?? null;

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
        $imagem_comp_representante = null;
  } else {
      echo "Erro no envio do arquivo da cópia do rg do idoso: " . $_FILES['comprovante-representante']['error'];
      exit;
  }

  // Envio dos dados
  $query = "INSERT INTO cartao_deficiente (nome_beneficiario, nasc_beneficiario, genero_beneficiario, endereco_beneficiario, numero_beneficiario, complemento_beneficiario, bairro_beneficiario, cep_beneficiario, cidade_beneficiario, uf_beneficiario, telefone_beneficiario, rg_beneficiario, expedicao_beneficiario, expedido_beneficiario, cnh_beneficiario, validade_cnh_beneficiario, email_beneficiario, copia_rg_beneficiario, nome_medico, crm, telefone_medico, local_atendimento_medico, deficiencia_ambulatoria, periodo_restricao_medica, data_inicio, data_fim, cid, atestado_medico,nome_representante, email_representante, endereco_representante, num_representante, complemento_representante, bairro_representante, cep_representante, cidade_representante, uf_representante, telefone_representante, rg_representante, expedicao_representante, expedido_representante, copia_rg_representante, comprovante_representante) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";  

  $stmt = mysqli_prepare($conn, $query);
  if ($stmt === false) {
    echo "Erro ao preparar a consulta: " . mysqli_error($conn);
    exit;
  }

  mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssssssssbssssssssssbsssssssssssssbb", 
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
    $img_atestado_medico,
    $nome_representante,
    $email_representante,
    $endereco_representante,
    $num_representante,
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

    if(isset($img_rg_beneficiario)){
      mysqli_stmt_send_long_data($stmt, 17, $img_rg_beneficiario);
    }

    if(isset($img_atestado_medico)){
      mysqli_stmt_send_long_data($stmt, 27, $img_atestado_medico);
    }

    if(isset($imagem_rg_representante)){
      mysqli_stmt_send_long_data($stmt, 42, $imagem_rg_representante);
    }

    if(isset($imagem_comp_representante)){
      mysqli_stmt_send_long_data($stmt, 43, $imagem_comp_representante);
    }

    $executed = mysqli_stmt_execute($stmt);

    if ($executed) {
      echo "Dados enviados com sucesso!";
      
    } else {
      echo "Erro ao enviar dados: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);   

  if ($executed) {
  $_SESSION['success-form-deficiente'] = "Informações enviadas com sucesso";
  header("Location: ../../pages/form-deficiente.php");
  exit();
  } 