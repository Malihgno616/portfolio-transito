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

?>

<?php 

$rg_beneficiario = $_POST['rg-beneficiario'];
$motivo_cancela = $_POST['motivo-cancela'];
$verify = "SELECT * from cartao_deficiente where rg_beneficiario = '$rg_beneficiario'";
$result = mysqli_query($conn,$verify);

if(mysqli_num_rows($result) > 0){

  $query = "INSERT INTO cancelamento_cartao_deficiente (rg_solicitante, motivo_cancela) values (?,?)";
  $stmt = mysqli_prepare($conn, $query);

  if($stmt === false ){
    echo "Erro ao preparar a consulta: " . mysqli_error($conn);
    exit;
  }
  
  mysqli_stmt_bind_param($stmt, "ss", $rg_beneficiario, $motivo_cancela);

  $executed = mysqli_stmt_execute($stmt);

  if($executed) {
    $mensagem = "Solicitação enviada com sucesso!";
  } else {
    $mensagem = "Erro ao enviar dados!" . mysqli_error($conn);
  }

} else {
  $mensagem = "RG não encontrado na tabela de cartões";
}

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
    <?php
    // Verifica se a execução da consulta foi bem-sucedida
    echo "<p>$mensagem</p>";

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
    ?>
    <a href="../../public/index.php">Clique para voltar à página principal</a>
  </div>
</body>
</html>