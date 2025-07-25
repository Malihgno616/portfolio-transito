<?php 

namespace UsersModel\UsersModel;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;
use Exception;

class UsersModel {
  
  private $conn;

  private $pdo;

  public function __construct() {
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $this->pdo = $this->conn->connect();
  }
  
  public function countUsers()
  {
      $query = "SELECT COUNT(*) FROM login_adm";
      
      $stmt = $this->pdo->prepare($query);
      $stmt->execute();
            
      return (int)$stmt->fetchColumn();
  }

  public function allUsers($page, $limit)
  {

    if($page < 1) $page = 1;

    $offset = ($page - 1) * $limit; 
  
    $query = "SELECT id, name_adm, username, level FROM login_adm ORDER BY id DESC LIMIT :limit OFFSET :offset";
    
    $stmt = $this->pdo->prepare($query);
    
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
    $stmt->execute();
    
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];

    $totalUsers = $this->countUsers();
    
    $totalPages = ceil($totalUsers / $limit);
    
    return [
        'users' => $users,
        'totalUsers' => $totalUsers,
        'totalPages' => $totalPages,
        'currentPage' => $page,
        'limit' => $limit
    ];   
  
  }

  public function createUser($nameUser, $nameLogin, $pass, $level = 1)
  {   

    try {

      $checkQuery = "SELECT COUNT(*) FROM login_adm WHERE username = :username";
      $checkStmt = $this->pdo->prepare($checkQuery);
      $checkStmt->bindValue(':username', $nameLogin);
      $checkStmt->execute();
        
      if ($checkStmt->fetchColumn() > 0) {
          throw new Exception("Este nome de usuário já está em uso");
      }

      $query = "INSERT INTO login_adm (name_adm, username, pass, level) VALUES(:name_adm, :username, :pass, :level)";
  
      $stmt = $this->pdo->prepare($query);
  
      $inputs = [
      ':name_adm' => $nameUser,
      ':username' => $nameLogin,
      ':pass' => $pass,
      ':level' => $level
      ];

    foreach ($inputs as $param => $value) {
        $stmt->bindValue($param, $value);
    }
  
    $executed = $stmt->execute();
      
      return $executed;

    } catch(PDOException $e) {
      
      return "Error: ". $e->getMessage();
    }

  }

  public function updateUser()
  {
    return null;
  }
  
  public function deleteUser($id)
  {
    try {

      $query = "DELETE FROM login_adm WHERE id = :id";
      
      $stmt = $this->pdo->prepare($query);
      
      $stmt->bindValue(':id', $id);
      
      $executed = $stmt->execute();
      
      return $executed;

    } catch (PDOException $e) {
      
      return "Error: ". $e->getMessage();
    
    }

  }

}