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

  public function sendNotification($descricao = "", $categoria = "", $linkNotificacao = "")
  {
    
    try {

      $query = "INSERT INTO notificacoes (descricao, categoria, link_notificacao) VALUES (:desc, :cat, :link_notificacao)";

      $stmt = $this->pdo->prepare($query);
      
      $stmt->bindValue(':desc', $descricao);
      
      $stmt->bindValue(':cat', $categoria);
      
      $stmt->bindValue(':link_notificacao', $linkNotificacao);
      
      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);
            
    } catch(PDOException $e) {
      error_log("Error: " . $e->getMessage());
      return false;
    }

  }
  
  public function paginatedNotifications($page, $limit)
  {
      try {
          if ($page < 1) $page = 1;
          $offset = ($page - 1) * $limit;
          
          $queryCount = "SELECT COUNT(*) as total FROM notificacoes";
          $stmtCount = $this->pdo->prepare($queryCount);
          $stmtCount->execute();

          $result = $stmtCount->fetch(PDO::FETCH_ASSOC);
          $total = $result ? (int) $result['total'] : 0;

          $totalPages = $limit > 0 ? ceil($total / $limit) : 0;

          $queryNotifications = "SELECT id, descricao, categoria, data, link_notificacao FROM notificacoes ORDER BY id DESC LIMIT :limit OFFSET :offset";
          $stmtNotificacoes = $this->pdo->prepare($queryNotifications);

          $stmtNotificacoes->bindValue(':limit', $limit, PDO::PARAM_INT);
          $stmtNotificacoes->bindValue(':offset', $offset, PDO::PARAM_INT);
          $stmtNotificacoes->execute();

          $notificacoes = $stmtNotificacoes->fetchAll(PDO::FETCH_ASSOC);

          return [
              'notificacoes' => $notificacoes,
              'total' => $total,
              'page' => $page,
              'limit' => $limit,
              'totalPages' => $totalPages
          ];

      } catch (PDOException $e) {
          error_log("Error: " . $e->getMessage());
          return [
              'notificacoes' => [],
              'total' => 0,
              'page' => $page,
              'limit' => $limit,
              'totalPages' => 0
          ];
      }
  }


}
