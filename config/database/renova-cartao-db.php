<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require('conn.php');

$rg_beneficiario = $_POST['rg-beneficiario'];

$conn = new Conn();
$pdo = $conn->connect();

try {
  $query = "SELECT * FROM cartao_deficiente where rg_beneficiario = :rg_beneficiario";
  
  $stmt = $pdo->prepare($query);

  $stmt->bindValue(":rg_beneficiario", $rg_beneficiario, PDO::PARAM_STR);

  $result = $stmt->execute();
  $count = $stmt->rowCount();

  if ($count > 0) {
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['dados_beneficiario'] = $data; 
    header("Location: ../../pages/dados-beneficiario-renova.php");
    exit();
  } else {
    $_SESSION['erro-dados-def-renova'] = "Número do RG não encontrado/existente.";
    header("Location: ../../pages/renovar-cartao.php");
    exit();
  }
  
} catch(PDOException $e) {
  $_SESSION['erro-dados-def-renova'] = "Erro ao consultar o banco de dados: " . $e->getMessage();
  header("Location: ../../pages/renovar-cartao.php");
  exit();
}