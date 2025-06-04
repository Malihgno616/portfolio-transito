<?php 

require __DIR__.'/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ , '/../../');
$dotenv->load();

define("DB_HOST", getenv('DB_HOST'));
define("DB_NAME", getenv('DB_NAME'));
define("DB_USER", getenv('DB_USER'));
define("DB_PASSWORD", getenv('DB_PASSWORD'));

class Conn {
  
  public function connect(){
    try {
      $pdo = new PDO('mysql:host='. DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', 
      DB_USER,
      DB_PASSWORD);
      
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;

    } catch (PDOException $e) {
      die("Erro ao conectar ao banco de dados: " . $e->getMessage());
    }
  }
}