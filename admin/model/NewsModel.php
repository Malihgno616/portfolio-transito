<?php 

namespace Model\NewsModel;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;
use Exception;

class NewsModel { 

  private $conn;

  private $pdo;

  public function __construct() {
    
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $this->pdo = $this->conn->connect();
  }

  public function getMainNewsById($newsId)
  {
    
    $query = "SELECT * FROM noticia_principal WHERE noticia_id = :noticia_id";

    $stmt = $this->pdo->prepare($query);
    
    $stmt->bindParam(':noticia_id', $newsId, PDO::PARAM_INT);
    
    $executed = $stmt->execute();

    return $executed;
    
  }

  public function addMainNews($titleNews, $imageMainNews = null, $subtitleNews)
  {
    
    try {
      
      $query = "INSERT INTO noticia_principal(img_noticia, titulo_principal, subtitulo) VALUES (:img_noticia, :titulo_princiapl, subtitulo)";
      
      $stmt = $this->pdo->prepare($query);

      $stmt->bindValue(':img_noticia', $imageMainNews, PDO::PARAM_STR);
      
      $stmt->bindValue(':titulo_princiapl', $titleNews, PDO::PARAM_STR);
      
      $stmt->bindValue(':subtitulo', $subtitleNews, PDO::PARAM_STR);
      
      $stmt->execute();

      return $stmt->fetchAll();

    } catch(PDOException $e) {
      
      return 'ERROR: ' . $e->getMessage();
    
    }

  }

  public function addContentNews($imgContent = null, $titleContent, $subtitleContent, $textContent)
  {
    try {

      $addContentQuery = "INSERT INTO conteudo_noticia(img_conteudo, titulo_conteudo, subtitulo_conteudo, texto_conteudo) VALUES (:img_conteudo, :titulo_conteudo, :subtitulo_conteudo, :texto_conteudo)";
      
      $stmt = $this->pdo->prepare($addContentQuery);
      
      $stmt->bindValue(':img_conteudo', $imgContent, PDO::PARAM_STR);

      $stmt->bindValue('titulo_conteudo', $titleContent, PDO::PARAM_STR);

      $stmt->bindValue(':subtitulo_conteudo', $subtitleContent, PDO::PARAM_STR);

      $stmt->bindValue(':texto_conteudo', $textContent, PDO::PARAM_STR);

      $stmt->execute();
      
      return $stmt->fetchAll();

    } catch (PDOException $e) {
      
      return 'ERROR: ' . $e->getMessage();
    
    }
  }

  public function updateRelationalNewsId($newsId, $contentId)
  {
    try {

      $updateQuery = "UPDATE conteudo_noticia SET noticia_id = :noticia_id WHERE conteudo_noticia.id_conteudo = :id_conteudo";

      $stmt = $this->pdo->prepare($updateQuery);

      $stmt->bindValue(':noticia_id', $newsId, PDO::PARAM_INT);

      $stmt->bindValue(':id_conteudo', $contentId, PDO::PARAM_INT);

      $stmt->execute();

      return $stmt->fetchAll();

    } catch(PDOException $e) {

      return "Error: " . $e->getMessage();

    }

  }
}