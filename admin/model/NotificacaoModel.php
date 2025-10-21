<?php 

namespace Model;

require_once __DIR__.'/../config/conn.php';
require_once __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

class NotificacaoModel {

  private $conn;

  private $pdo;

  public function __construct() {
    
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $this->pdo = $this->conn->connect();
  }

  public function sendNotification($descricao = "", $categoria = "")
  {
    
    try {

      $query = "INSERT INTO notificacoes (descricao, categoria) VALUES (:desc, :cat)";

      $stmt = $this->pdo->prepare($query);
      
      $stmt->bindValue(':desc', $descricao);
      
      $stmt->bindValue(':cat', $categoria);
      
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
            
    } catch(PDOException $e) {
      error_log("Error: " . $e->getMessage());
      return false;
    }

  }
  
  public function paginatedNotifications()
  {
    return 0;    
  }

}
