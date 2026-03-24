<?php 

namespace Model\NewsModel;

require_once __DIR__.'/../config/conn.php';
require_once __DIR__.'/../config/env.php';

use Conn;
use PDO;
use PDOException;

class NewsModel { 

  private $conn;

  private $pdo;

  public function __construct() {
    
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $this->pdo = $this->conn->connect();
  }
  
  public function sendNews($fileNews, $nameFileNews, $content)
  {
    try {
        $query = "INSERT INTO conteudo_noticia (img_noticia, nome_img_noticia, conteudo) VALUES (:img_noticia, :nome_img_noticia, :conteudo)";
        
        $stmt = $this->pdo->prepare($query);
        
        $stmt->bindValue(":img_noticia", $fileNews, PDO::PARAM_LOB);
        $stmt->bindValue(":nome_img_noticia", $nameFileNews, PDO::PARAM_LOB);
        $stmt->bindValue(":conteudo", $content, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->rowCount() > 0;

    } catch(PDOException $e) {
        error_log("Error: ". $e->getMessage());
        return false;
    }
  }

  private function totalNews()
  {
    try {
      $query = "SELECT COUNT(*) as total FROM conteudo_noticia";

      $stmt = $this->pdo->prepare($query);

      $stmt->execute();

      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      
      return $result['total'];

    } catch(PDOException $e) {
      error_log("Error:" . $e->getMessage());
      return false;
    }
  }
  
  public function paginatedNews($limit, $offset) 
  {
      try {
          $limit = max(1, (int)$limit);
          
          $offset = max(0, (int)$offset); 

          $page = ($offset / $limit) + 1;
          
          $query = "SELECT * FROM conteudo_noticia ORDER BY id DESC LIMIT :limit OFFSET :offset";
          
          $stmt = $this->pdo->prepare($query);
          $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
          $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
          $stmt->execute();
          
          $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
          return [
              "limit" => $limit,
              "offset" => $offset,
              "news" => $news,
              "page" => (int)$page,
              "total" => $this->totalNews(),
          ];
          
      } catch(PDOException $e) {
          error_log("Error in paginatedNews: " . $e->getMessage());
          return [
              "limit" => 0,
              "offset" => 0,
              "news" => [],
              "page" => 0,
              "total" => 0,
              "error" => true
          ];
      }
  }

  public function getImageNews($id)
  {
    try {
      $query = "SELECT img_noticia, nome_img_noticia FROM conteudo_noticia WHERE id = :id";

      $stmt = $this->pdo->prepare($query);

      $stmt->bindValue(":id", $id, PDO::PARAM_INT);

      $stmt->execute();

      return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {
      error_log("Error: ". $e->getMessage());
      return false;
    }
  }

  public function updateNews($content)
  {
    
  }

  public function featureNews($featured)
  {
    
  }

  public function unfeatureNews($featured)
  {
    
  }

}