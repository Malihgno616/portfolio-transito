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
  
    $query = "SELECT id, user_login, username, level FROM login_adm ORDER BY id DESC LIMIT :limit OFFSET :offset";
    
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

  public function createUser($userLogin, $userName, $pass, $level = 1)
  {   

    try {

      $checkQuery = "SELECT COUNT(*) FROM login_adm WHERE username = :username";
      $checkStmt = $this->pdo->prepare($checkQuery);
      $checkStmt->bindValue(':username', $userName);
      $checkStmt->execute();
        
      if ($checkStmt->fetchColumn() > 0) {
          throw new Exception("Este nome de usuário já está em uso");
      }

      $query = "INSERT INTO login_adm (user_login, username, pass, level) VALUES(:user_login, :username, :pass, :level)";
  
      $stmt = $this->pdo->prepare($query);
  
      $inputs = [
      ':user_login' => $userLogin,
      ':username' => $userName,
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

  public function updateUser($id, $login, $username, $pass, $level)
  {
    try {

      $checkQuery = "SELECT * FROM login_adm WHERE id = :id";
      $checkStmt = $this->pdo->prepare($checkQuery);
      $checkStmt->bindValue(':id', $id);
      $checkStmt->execute();
      $user = $checkStmt->fetch();
      if (!$user) {
        throw new Exception("Este usuário não existe"); 
      }

      $updateQuery = "UPDATE login_adm 
      SET user_login = :user_login, 
          username = :username, 
          pass = :pass, 
          level = :level, 
          alteration = NOW() 
      WHERE id = :id";
      
      $updateStmt = $this->pdo->prepare($updateQuery);
      $updateStmt->bindValue(':id', $id);
      $updateStmt->bindValue(':user_login', $login);
      $updateStmt->bindValue(':username', $username);
      $updateStmt->bindValue(':pass', $pass);
      $updateStmt->bindValue(':level', $level);

      $updateStmt->execute();
      return true;

    } catch(PDOException $e) {
      error_log("DB Error: " . $e->getMessage()); // Log interno
      return "Erro ao atualizar usuário. Tente novamente mais tarde.";
    }

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