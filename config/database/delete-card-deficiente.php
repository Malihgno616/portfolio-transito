<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('conn.php');

$rg_beneficiario = $_POST['rg-beneficiario'];

$conn = new Conn();
$pdo = $conn->connect();

try {

  $query = "DELETE FROM cartao_deficiente where rg_beneficiario = :rg_beneficiario";

  $stmt = $pdo->prepare($query);

  $stmt->bindValue(':rg_beneficiario', $rg_beneficiario, PDO::PARAM_STR);

  $executed = $stmt->execute();

  if ($executed) {
    $_SESSION['delete-card-deficiente'] = "Cartão deletado com sucesso!";
    header("Location: ../../pages/cancelar-cartao.php");
    exit();
  } else {
    $_SESSION['delete-card-deficiente'] = "Erro ao deletar cartão!";
    header("Location: ../../pages/cancelar-cartao.php");
    exit();
  }

} catch (PDOException $e) {
  $_SESSION['delete-card-deficiente'] = "Erro ao banco de dados: " . $e->getMessage();
  header("Location: ../pages/cancelar-cartao.php");
  exit();
}
