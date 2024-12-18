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
    } catch(mysqli_sql_exception) {
      echo "Erro ao conectar com o banco de dados!";
    }

    if($conn) {
      echo "Conexão com o banco de dados realizada com sucesso!";
    } 

    

?>