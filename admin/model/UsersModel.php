<?php 

namespace UsersModel\UsersModel;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

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
  
    $query = "SELECT username, level FROM login_adm ORDER BY id DESC LIMIT :limit OFFSET :offset";
    
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

  public function createUser()
  {
    return null;
  }

  public function updateUser()
  {
    return null;
  }

  public function deleteUser()
  {
    return null;
  }

}