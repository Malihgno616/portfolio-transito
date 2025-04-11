<?php 
session_start();

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
    throw new Exception("Erro ao conectar com o banco de dados!");
  }
  
  mysqli_set_charset($conn, "utf8mb4");

} catch (Exception $e) {
  echo $e->getMessage();
  exit;
}

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$mensagem = $_POST["mensagem"];

if (empty($nome) || empty($email) || empty($telefone) || empty($mensagem)) {
    $_SESSION['erro'] = "Por favor, preencha todos os campos";
    header("Location: ../../pages/contato.php");
    exit();
}

$query = "INSERT INTO form_contato (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
  echo "Erro ao preparar a consulta: " . mysqli_error($conn);
  exit;
}

mysqli_stmt_bind_param($stmt, "ssss", $nome, $email, $telefone, $mensagem);

$executed = mysqli_stmt_execute($stmt);

if ($executed) {
  $_SESSION['sucesso'] = "Mensagem enviada com sucesso!";
  header("Location: ../../pages/contato.php");
  exit;
} else {
  $_SESSION['erro-sql'] = "Erro ao enviar os dados: " . mysqli_stmt_error($stmt);
  header("Location: ../../pages/contato.php");
  exit;
}

?>