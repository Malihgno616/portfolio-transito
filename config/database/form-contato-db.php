<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('conn.php');

$_SESSION['old-contact'] = [
  'nome' => $_POST['nome'] ?? '',
  'email' => $_POST['email'] ?? '',
  'telefone' => $_POST['telefone'] ?? '',
  'mensagem' => $_POST['mensagem'] ?? ''
];

$nome = htmlspecialchars(trim($_POST["nome"]));
$email = htmlspecialchars(trim($_POST["email"]));
$telefone = htmlspecialchars(trim($_POST["telefone"]));
$mensagem = htmlspecialchars(trim($_POST["mensagem"]));

$campos_obrigatorios = ["nome", "email", "telefone", "mensagem"];
$array_erro = [];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $array_erro['email'] = "Formato de e-mail inválido";
}

foreach ($campos_obrigatorios as $campo) {
  if (empty($_POST[$campo])) {
      if ($campo === 'mensagem') {
          $array_erro[$campo] = "Por favor, digite sua mensagem";
      } else {
          $array_erro[$campo] = "Por favor, preencha o seu {$campo}!";
      }
  }
}

if (!empty($array_erro)){
  $_SESSION['erro-campos'] = $array_erro;
  $_SESSION['erro'] = "Por favor, preencha todos os campos.";
  header("Location: ../../contato");
  exit();
}

$conn = new Conn();
$pdo = $conn->connect();

try {
  $query = "INSERT INTO form_contato (nome, email, telefone, mensagem) VALUES (:nome, :email, :telefone, :mensagem)";
  $stmt = $pdo->prepare($query);

  $stmt->execute([
    ':nome' => $nome,
    ':email' => $email,
    ':telefone' => $telefone,
    ':mensagem' => $mensagem
  ]);

  $_SESSION['sucesso'] = "Mensagem enviada com sucesso!";
  header("Location: ../../contato");
  exit();

} catch (PDOException $e) {
    $_SESSION['erro-sql'] = "Erro ao enviar os dados: " . $e->getMessage();
    header("Location: ../../contato");
    exit;
}