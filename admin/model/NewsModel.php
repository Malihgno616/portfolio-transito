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
        np.img_noticia as img_noticia,
        np.nome_img_noticia as nome_img_noticia, 
        np.titulo_principal,
        np.subtitulo AS subtitulo_principal,
        cn.id_conteudo,
        cn.img_conteudo as img_conteudo,
        cn.nome_img_conteudo as nome_img_conteudo,
        cn.titulo_conteudo,
        cn.subtitulo_conteudo,
        cn.texto_conteudo as texto
        FROM 
            noticia_principal np
        JOIN 
            conteudo_noticia cn ON np.id_noticia = cn.noticia_id
        GROUP BY np.id_noticia, cn.id_conteudo 
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
    public function addMainNews($titleNews, $subtitleNews, $nameImgMainNews = "", $fileMainNews = null)
    {
        try {
            $query = "INSERT INTO noticia_principal(titulo_principal, img_noticia, nome_img_noticia, subtitulo) 
                    VALUES (:titulo_principal, :img_noticia, :nome_img_noticia, :subtitulo)";
            
            $stmt = $this->pdo->prepare($query);
                            
            $stmt->bindValue(':titulo_principal', $titleNews, PDO::PARAM_STR);
            $stmt->bindValue(':nome_img_noticia', $nameImgMainNews, PDO::PARAM_STR);
            
            // Se um arquivo foi enviado, vincule como LOB, caso contrário, vincule como NULL
            if ($fileMainNews !== null) {
                $stmt->bindValue(':img_noticia', $fileMainNews, PDO::PARAM_LOB);
            } else {
                $stmt->bindValue(':img_noticia', null, PDO::PARAM_NULL);
            }
            
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

  public function getContentNews($idContent)
  {
    try {

        $query = "SELECT * FROM conteudo_noticia WHERE id_conteudo = :id_conteudo";

        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':id_conteudo', $idContent, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    } catch(PDOException $e) {

        return "Error: " . $e->getMessage();
    
    }
  }

  public function getFeaturedNews($page, $limit, $offset)
  {
    $page = max(1, (int)$page);
    try {
        $query = "SELECT DISTINCT
        np.id_noticia,
        np.img_noticia as img_noticia,
        np.nome_img_noticia as nome_img_noticia, 
        np.titulo_principal,
        np.subtitulo AS subtitulo_principal,
        cn.id_conteudo,
        cn.img_conteudo as img_conteudo,
        cn.nome_img_conteudo as nome_img_conteudo,
        cn.titulo_conteudo,
        cn.subtitulo_conteudo,
        cn.texto_conteudo as texto
        FROM 
            noticia_principal np
        JOIN 
            conteudo_noticia cn ON np.id_noticia = cn.noticia_id
        WHERE cn.destaque = 1
        GROUP BY np.id_noticia, cn.id_conteudo
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

  public function countFeaturedNews()
  {
    try {

        $query = "SELECT COUNT(DISTINCT np.id_noticia) as total 
                  FROM noticia_principal np
                  JOIN conteudo_noticia cn ON np.id_noticia = cn.noticia_id
                  WHERE cn.destaque = 1";
        
        $stmt = $this->pdo->prepare($query);
        
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];

    } catch(PDOException $e) {
        return "Error: " . $e->getMessage();
    }
  }

  public function addContentNews($titleContent, $subtitleContent, $textContent, $nameImageContent = "", $imageContent = "")
  {
      try {
          
          $addContentQuery = "INSERT INTO conteudo_noticia(titulo_conteudo, subtitulo_conteudo, img_conteudo, nome_img_conteudo, texto_conteudo) 
                              VALUES (:titulo_conteudo, :subtitulo_conteudo, :img_conteudo,:nome_img_conteudo,:texto_conteudo)";
          
          $stmt = $this->pdo->prepare($addContentQuery);
          
          $stmt->bindValue(':titulo_conteudo', $titleContent, PDO::PARAM_STR);
          
          $stmt->bindValue(':subtitulo_conteudo', $subtitleContent, PDO::PARAM_STR);
          
          $stmt->bindValue(':img_conteudo', $imageContent, PDO::PARAM_LOB);

          $stmt->bindValue(':nome_img_conteudo', $nameImageContent, PDO::PARAM_STR);

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

    public function deleteNews($idMainNews, $idContentNews)
    {
    try {
        $this->pdo->beginTransaction();

        $queryContent = "DELETE FROM conteudo_noticia WHERE id_conteudo = :id_conteudo";
        
        $stmt = $this->pdo->prepare($queryContent);
        
        $stmt->bindValue(':id_conteudo', $idContentNews, PDO::PARAM_INT);
        
        $stmt->execute();

        $queryMain = "DELETE FROM noticia_principal WHERE id_noticia = :id_noticia";
        
        $stmt = $this->pdo->prepare($queryMain);
        
        $stmt->bindValue(':id_noticia', $idMainNews, PDO::PARAM_INT);
        
        $stmt->execute();

        $this->pdo->commit();
        
        return true;

    } catch(PDOException $e) {
  
        error_log("Erro ao deletar notícia: " . $e->getMessage());
  
        return false;
 
        } 
    }

    public function updateNews($idMainNews, $idContentNews, $titleNews, $subtitleNews, $titleContent, $subtitleContent, $textContent, $imageMainNews = null, $nameImageMainNews = "", $updateMainImage = false, $imageContent = null, $nameImageContent = "", $updateContentImage = false)
    {
        try {
            $this->pdo->beginTransaction();

            $checkQueryMainNews = "SELECT * FROM noticia_principal WHERE id_noticia = :id_noticia";
            $stmt = $this->pdo->prepare($checkQueryMainNews);
            $stmt->bindValue(':id_noticia', $idMainNews, PDO::PARAM_INT);
            $stmt->execute();
            
            $checkQueryContentNews = "SELECT * FROM conteudo_noticia WHERE id_conteudo = :id_conteudo";
            $stmtContent = $this->pdo->prepare($checkQueryContentNews);
            $stmtContent->bindValue(':id_conteudo', $idContentNews, PDO::PARAM_INT);
            $stmtContent->execute();

            if ($stmt->rowCount() === 0 || $stmtContent->rowCount() === 0) {
                $this->pdo->rollBack();
                error_log("Notícia principal ou conteúdo não encontrado. Main ID: $idMainNews, Content ID: $idContentNews");
                return false;
            }
            
            // Atualizar notícia principal com tratamento condicional da imagem
            if ($updateMainImage) {
                // Se há nova imagem, atualizar com o BLOB
                $updateQueryMain = "UPDATE noticia_principal SET titulo_principal = :titulo_principal, img_noticia = :img_noticia, nome_img_noticia = :nome_img_noticia, subtitulo = :subtitulo WHERE id_noticia = :id_noticia";
                $stmtMain = $this->pdo->prepare($updateQueryMain);
                $stmtMain->bindValue(':img_noticia', $imageMainNews, PDO::PARAM_LOB);
            } else {
                // Se não há nova imagem, manter a existente e atualizar apenas o nome
                $updateQueryMain = "UPDATE noticia_principal SET titulo_principal = :titulo_principal, nome_img_noticia = :nome_img_noticia, subtitulo = :subtitulo WHERE id_noticia = :id_noticia";
                $stmtMain = $this->pdo->prepare($updateQueryMain);
            }

            $stmtMain->bindValue(':titulo_principal', $titleNews, PDO::PARAM_STR);
            $stmtMain->bindValue(':subtitulo', $subtitleNews, PDO::PARAM_STR);
            $stmtMain->bindValue(':nome_img_noticia', $nameImageMainNews, PDO::PARAM_STR);
            $stmtMain->bindValue(':id_noticia', $idMainNews, PDO::PARAM_INT);
            $stmtMain->execute();

            // Atualizar conteúdo da notícia com tratamento condicional da imagem
            if ($updateContentImage) {
                // Se há nova imagem, atualizar com o BLOB
                $updateQueryContent = "UPDATE conteudo_noticia SET titulo_conteudo = :titulo_conteudo, img_conteudo = :img_conteudo, nome_img_conteudo = :nome_img_conteudo, subtitulo_conteudo = :subtitulo_conteudo, texto_conteudo = :texto_conteudo WHERE id_conteudo = :id_conteudo";
                $stmtContent = $this->pdo->prepare($updateQueryContent);
                $stmtContent->bindValue(':img_conteudo', $imageContent, PDO::PARAM_LOB);
            } else {
                // Se não há nova imagem, manter a existente e atualizar apenas o nome
                $updateQueryContent = "UPDATE conteudo_noticia SET titulo_conteudo = :titulo_conteudo, nome_img_conteudo = :nome_img_conteudo, subtitulo_conteudo = :subtitulo_conteudo, texto_conteudo = :texto_conteudo WHERE id_conteudo = :id_conteudo";
                $stmtContent = $this->pdo->prepare($updateQueryContent);
            }

            $stmtContent->bindValue(':titulo_conteudo', $titleContent, PDO::PARAM_STR);
            $stmtContent->bindValue(':nome_img_conteudo', $nameImageContent, PDO::PARAM_STR);
            $stmtContent->bindValue(':subtitulo_conteudo', $subtitleContent, PDO::PARAM_STR);
            $stmtContent->bindValue(':texto_conteudo', $textContent, PDO::PARAM_STR);
            $stmtContent->bindValue(':id_conteudo', $idContentNews, PDO::PARAM_INT);
            $stmtContent->execute();

            $this->pdo->commit();
            return true;

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Erro ao atualizar notícia: " . $e->getMessage());
            return false;
        }
    }
}