<?php 
  ini_set("default_charset", "utf8mb4");

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
      throw new Exception("Erro ao conectar ao banco de dados");
    }
    
    mysqli_set_charset($conn,"utf8mb4");

  } catch (Exception $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
    exit;
  }

?>

<?php 

  $nome_idoso = $_POST["nome-idoso"];
  $nascimento_idoso = $_POST["nascimento-idoso"];
  $genero_idoso = $_POST["genero-idoso"];
  $endereco_idoso = $_POST["endereco-idoso"];
  $num_endereco_idoso = $_POST["numero-endereco-idoso"];
  $complemento_idoso = $_POST["complemento-idoso"];
  $bairro_idoso = $_POST["bairro-idoso"];
  $cep_idoso = $_POST["cep-idoso"];
  $cidade_idoso = $_POST["cidade-idoso"];
  $uf_idoso = $_POST["uf-idoso"];
  $tel_idoso = $_POST["telefone-idoso"];
  $rg_idoso = $_POST["rg-idoso"];
  $expedicao_idoso = $_POST["data-expedicao-idoso"];
  $expedido_idoso = $_POST["expedido-idoso"];
  $cnh_idoso = $_POST["cnh-idoso"];
  $validade_cnh_idoso["validade-cnh-idoso"];
  $email_idoso = $_POST["email-idoso"];
  $copia_rg_idoso = $_POST["copia-rg-idoso"];

?>