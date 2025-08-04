<?php 

namespace Model\NewsModel;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

class NewsModel { 

  private $conn;

  private $pdo;

  public function __construct() {
    
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    $this->pdo = $this->conn->connect();
  }

  public function publishedNews($page, $limit, $offset)
  {
    try {

        if($page < 0) $page = 1;

        $query ="SELECT DISTINCT
        np.id_noticia,
        np.titulo_principal,
        np.subtitulo AS subtitulo_principal,
        cn.titulo_conteudo,
        cn.subtitulo_conteudo,
        cn.texto_conteudo as texto
        FROM 
            noticia_principal np
        JOIN 
            conteudo_noticia cn ON np.id_noticia = cn.noticia_id
        GROUP BY np.id_noticia
        ORDER BY np.id_noticia DESC
        LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    } catch(PDOException $e) {

        return "Error: " . $e->getMessage();
    
    }
  }

  public function countAllNews()
  {
    try {

        $query = "SELECT COUNT(DISTINCT np.id_noticia) as total 
                  FROM noticia_principal np
                  JOIN conteudo_noticia cn ON np.id_noticia = cn.noticia_id";
        
        $stmt = $this->pdo->prepare($query);
        
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];

    } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
    }
  }

  public function addMainNews($titleNews, $subtitleNews)
  {
      try {
          $query = "INSERT INTO noticia_principal(titulo_principal, subtitulo) 
                    VALUES (:titulo_principal, :subtitulo)";
          
          $stmt = $this->pdo->prepare($query);
          
          $stmt->bindValue(':titulo_principal', $titleNews, PDO::PARAM_STR);
          $stmt->bindValue(':subtitulo', $subtitleNews, PDO::PARAM_STR);
          
          if ($stmt->execute()) {
              return $this->pdo->lastInsertId(); 
          }
          
          return false;

      } catch(PDOException $e) {
          error_log('ERROR: ' . $e->getMessage());
          return false;
      }
  }

  public function getMainNews($newsId)
  {
    
    try {
      
      $query = "SELECT * FROM noticia_principal WHERE id_noticia = :id_noticia";
  
      $stmt = $this->pdo->prepare($query);
      
      $stmt->bindParam(':id_noticia', $newsId, PDO::PARAM_INT);
      
      $stmt->execute();
      
      return $stmt->fetch(PDO::FETCH_ASSOC); 
    
    } catch(PDOException $e) {

      return "Error: " . $e->getMessage();

    }
    
  }

  public function addContentNews($titleContent, $subtitleContent, $textContent)
  {
      try {
          
          $addContentQuery = "INSERT INTO conteudo_noticia(titulo_conteudo, subtitulo_conteudo, texto_conteudo) 
                              VALUES (:titulo_conteudo, :subtitulo_conteudo, :texto_conteudo)";
          
          $stmt = $this->pdo->prepare($addContentQuery);
          
          $stmt->bindValue(':titulo_conteudo', $titleContent, PDO::PARAM_STR);
          
          $stmt->bindValue(':subtitulo_conteudo', $subtitleContent, PDO::PARAM_STR);
          
          $stmt->bindValue(':texto_conteudo', $textContent, PDO::PARAM_STR);

          if ($stmt->execute()) {
              return $this->pdo->lastInsertId();
          }

          return false;

      } catch (PDOException $e) {
          error_log('Erro ao adicionar conteúdo: ' . $e->getMessage());
          return false;
      }
  }

  

  public function updateRelationalNews($newsId, $contentId)
  {
      try {
          $this->pdo->beginTransaction();

          $updateQuery = "UPDATE conteudo_noticia SET noticia_id = :noticia_id WHERE id_conteudo = :id_conteudo";
          
          $stmt = $this->pdo->prepare($updateQuery);

          $stmt->bindValue(':noticia_id', $newsId, PDO::PARAM_INT);
          
          $stmt->bindValue(':id_conteudo', $contentId, PDO::PARAM_INT);

          $stmt->execute();
          
          // Verifica quantas linhas foram afetadas
          $rowCount = $stmt->rowCount();
          
          if($rowCount === 0) {
              $this->pdo->rollBack();
              error_log("Nenhuma linha foi atualizada. newsId: $newsId, contentId: $contentId");
              return false;
          }
          
          $this->pdo->commit();
          return true;

      } catch(PDOException $e) {
          $this->pdo->rollBack();
          error_log("Erro ao atualizar relação: " . $e->getMessage());
          return false;
      }
  }
}