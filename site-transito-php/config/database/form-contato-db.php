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

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$mensagem = $_POST["mensagem"];

$string_sql = "INSERT INTO form_contato values (default,'{$nome}','{$email}','{$telefone}','{$mensagem}')";

$insert_contato = mysqli_query($conn, $string_sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Enviado</title>
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
      margin: 50px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    div {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    a {
      text-decoration: none;
      color: #f0f0f0;
      background-color:rgb(255, 73, 73);
      padding: .5rem;
      font-size: 1.25rem;
      border-radius: 10rem;
      transition: all .5s ease;
    }
    a:hover {
      filter: brightness(1.1);
    }
  </style>
</head>
<body>
  <div>
    <?php
    if(mysqli_affected_rows($conn)>0) {
      echo "<p>Dados enviados com sucesso!!</p>";
    } else {
      echo "<p>Erro ao enviar dados!!</p>";
    }
    mysqli_close($conn);
    ?>
    <a href="../../public/index.php">Clique para voltar à página principal</a>
  </div>
</body>
</html>
