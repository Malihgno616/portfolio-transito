<?php 
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