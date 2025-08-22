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

  public function getUser($id) 
  {
    $query = "SELECT * FROM login_adm WHERE id = :id";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function allUsers($page, $limit)
  {

    if($page < 1) $page = 1;

    $offset = ($page - 1) * $limit; 
  
    $query = "SELECT id, user_login, username, img_usuario, level, nome_img_usuario FROM login_adm ORDER BY id DESC LIMIT :limit OFFSET :offset";
    
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

  public function createUser($userLogin, $userName, $pass, $level = 1, $imgUser = null, $nameImgUser = "")
  {   
      try {
          $checkQuery = "SELECT COUNT(*) FROM login_adm WHERE username = :username";
          $checkStmt = $this->pdo->prepare($checkQuery);
          $checkStmt->bindValue(':username', $userName);
          $checkStmt->execute();
          
          if ($checkStmt->fetchColumn() > 0) {
              throw new Exception("Este nome de usuário já está em uso");
          }

          $query = "INSERT INTO login_adm (user_login, username, pass, level, img_usuario, nome_img_usuario) 
                  VALUES(:user_login, :username, :pass, :level, :img_usuario, :nome_img_usuario)";
    
          $stmt = $this->pdo->prepare($query);

          $stmt->bindValue(':user_login', $userLogin);
          $stmt->bindValue(':username', $userName);
          $stmt->bindValue(':pass', $pass);
          $stmt->bindValue(':level', $level);
          
          if ($imgUser !== null) {
              $stmt->bindValue(':img_usuario', $imgUser, PDO::PARAM_LOB);
          } else {
              $stmt->bindValue(':img_usuario', null, PDO::PARAM_NULL);
          }
          
          $stmt->bindValue(':nome_img_usuario', $nameImgUser);
    
          $executed = $stmt->execute();
          return $executed;

      } catch(PDOException $e) {
          error_log("Erro ao criar usuário: " . $e->getMessage());
          throw new Exception("Erro ao criar usuário: " . $e->getMessage());
      }
  }

  public function updateUser($id, $login, $username, $pass, $level, $imgUser = null, $nameImgUser = "", $updateImage = false)
  {
      try {
          // Verificar se o usuário existe
          $checkQuery = "SELECT * FROM login_adm WHERE id = :id";
          $checkStmt = $this->pdo->prepare($checkQuery);
          $checkStmt->bindValue(':id', $id, PDO::PARAM_INT);
          $checkStmt->execute();
          $user = $checkStmt->fetch();
          
          if (!$user) {
              throw new Exception("Este usuário não existe"); 
          }

          // Construir a query dinamicamente
          $queryParts = [];
          $params = [':id' => $id];
          
          // Campos obrigatórios
          $queryParts[] = "user_login = :user_login";
          $params[':user_login'] = $login;
          
          $queryParts[] = "username = :username";
          $params[':username'] = $username;
          
          $queryParts[] = "level = :level";
          $params[':level'] = $level;
          
          $queryParts[] = "alteration = NOW()";
          
          // Senha - só atualiza se foi fornecida
          if ($pass !== null) {
              $queryParts[] = "pass = :pass";
              $params[':pass'] = $pass;
          }
          
          // Imagem - só atualiza se o flag for true
          if ($updateImage) {
              $queryParts[] = "img_usuario = :img_usuario";
              $params[':img_usuario'] = $imgUser;
              
              $queryParts[] = "nome_img_usuario = :nome_img_usuario";
              $params[':nome_img_usuario'] = $nameImgUser;
          }
          
          // Montar a query final
          $updateQuery = "UPDATE login_adm SET " . implode(", ", $queryParts) . " WHERE id = :id";
          
          $updateStmt = $this->pdo->prepare($updateQuery);
          
          // Bind dos parâmetros
          foreach ($params as $key => $value) {
              $paramType = PDO::PARAM_STR;
              
              if ($key === ':id' || $key === ':level') {
                  $paramType = PDO::PARAM_INT;
              } elseif ($key === ':img_usuario') {
                  $paramType = PDO::PARAM_LOB;
              }
              
              $updateStmt->bindValue($key, $value, $paramType);
          }
          
          $updateStmt->execute();

          return $updateStmt->rowCount() > 0;

      } catch(PDOException $e) {
          error_log("DB Error: " . $e->getMessage());
          throw new Exception("Erro ao atualizar usuário. Tente novamente mais tarde.");
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