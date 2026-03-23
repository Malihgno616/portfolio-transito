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