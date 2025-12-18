<?php 

namespace Model\ContactModel;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

class ContactModel {

  private $conn;
  private $pdo;

  public function __construct() {
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $this->pdo = $this->conn->connect();
  }

  public function paginatedContacts($page, $limit)
  {

    if($page < 1) $page = 1;

    $offset = ($page -1) * $limit; 

    $stmt = $this->pdo->prepare("SELECT * FROM form_contato ORDER BY id DESC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $contacts = $stmt->fetchAll();
    
    $total = $this->contactCountTable();
    $totalPages = ceil($total / $limit);
    
    return [
        'contacts' => $contacts,
        'total' => $total,
        'page' => $page,
        'limit' => $limit,
        'totalPages' => $totalPages
    ];
  }

  public function contactCountTable()
  {
    $query = "SELECT COUNT(*) as total FROM form_contato";
    $stmt = $this->pdo->query($query);
    $row = $stmt->fetch();
    return $row['total'];
  }

  public function orderByName($limit, $offset)
  {
    try {

      $query = "SELECT * FROM form_contato ORDER BY nome ASC LIMIT :limit OFFSET :offset";
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        error_log("Erro ao ordenar por nome: " . $e->getMessage());
        return false;
    }

  }

  public function orderByDate($limit, $offset)
  {
    try {

      $query = "SELECT * FROM form_contato ORDER BY data_enviado DESC LIMIT :limit OFFSET :offset";
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        error_log("Erro ao ordenar por data: " . $e->getMessage());
        return false;
    }
  }

  public function orderById($limit, $offset)
  {
    try {

      $query = "SELECT * FROM form_contato ORDER BY id DESC LIMIT :limit OFFSET :offset";
      $stmt = $this->pdo->prepare($query);
      $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
      $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        error_log("Erro ao ordenar por ID: " . $e->getMessage());
        return false;
    }
  }

  public function searchContact($name = "", $id = null, $date = "", $phone = "")
  {
    try {
      
      $query = "SELECT * FROM form_contato WHERE 1 = 1";
      $stmt = $this->pdo->prepare($query);

      $params = [];

      if (!empty($name)) {
          $query .= " AND nome LIKE :name";
          $params[':name'] = '%' . $name . '%';
      } elseif (!empty($id)) {
          $query .= " AND id = :id";
          $params[':id'] = $id;
      } elseif (!empty($date)) {
          $query .= " AND DATE(data_enviado) = :date";
          $params[':date'] = $date;
      } elseif (!empty($phone)) {
          $query .= " AND telefone LIKE :phone";
          $params[':phone'] = '%' . $phone . '%';
      } else {
          $query .= " ORDER BY id DESC LIMIT 15";
      }

      $stmt = $this->pdo->prepare($query);

      foreach ($params as $key => $value) {
          $stmt->bindValue($key, $value);
      }

      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
        error_log("Erro ao buscar contato: " . $e->getMessage());
        return false;
    }
    
  }
  
  public function deleteContact($id)
  {
    try {
        $query = "DELETE FROM form_contato WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                
        $stmt->execute();
        
        return $stmt->rowCount();
        
    } catch (PDOException $e) {
        error_log("Erro ao deletar contato: " . $e->getMessage());
        return false;
    }
  }   

}

