<?php 

define('DB_HOST', 'localhost');

define('DB_USER', 'root');

define('DB_PASSWORD', '');

define('DB_NAME', 'site_transito');

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