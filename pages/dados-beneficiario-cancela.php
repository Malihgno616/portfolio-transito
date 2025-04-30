<?php 

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

$rg_beneficiario = $_POST["rg-beneficiario"];
// print_r($rg_beneficiario);

$query_select = "SELECT * FROM cartao_deficiente where rg_beneficiario = '$rg_beneficiario'";

$result = mysqli_query($conn, $query_select);

// Verificando se há resultados
if (mysqli_num_rows($result) > 0) {
  // Pega a linha de dados
  $beneficiario = mysqli_fetch_assoc($result);
} 
// else {
//   echo "Nenhum beneficiário encontrado com esse RG.";
// }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dados do Beneficiario</title>
  <?php include('../layout/head.php');?>
</head>

<body>
  <?php 
    include_once('../layout/header.php');
    include_once('../layout/title.php');
    include('../layout/dados-bene-cancela.php');
    include_once('../layout/footer.php');
  ?>