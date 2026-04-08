<?php 

namespace Models;
require __DIR__.'/../config/database/conn.php';
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/database/env.php';

use PDO;

use PDOException;

class News {
    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new \Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function detailedNews($id)
    {
        try {
            $query = "SELECT * FROM conteudo_noticia WHERE id = :id";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch(PDOException $e) {
            error_log("ERROR: " . $e->getMessage());
            return false;
        }
    }

   public function paginatedNews($limit, $offset)
   {
        try {
            $page = 1;

            if($page < 0) $page = 1;

            $query = "SELECT * FROM conteudo_noticia ORDER BY id DESC LIMIT :limit OFFSET :offset";
        
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(is_array($result)) {
                return $result;
            } else {
                return [];
            }

        } catch(PDOException $e) {
            error_log("Erro na paginação: " . $e->getMessage());
            return [];
        }
    }

    public function countAllNews()
    {
        try {
            $query = "SELECT COUNT(*) as total FROM conteudo_noticia";
            
            $stmt = $this->pdo->prepare($query);
            
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
            
        } catch(PDOException $e) {
            error_log("Erro ao contar notícias: " . $e->getMessage());
            return 0;
        }
    }

    public function featuredNews($limit)
    {
                
        try {
            $query = "SELECT * FROM conteudo_noticia WHERE destaque = 1 ORDER BY id DESC LIMIT :limit;";
                
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result ?: [];
            
        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return [];
        }
    }
    
    public function recentNews($limit)
    {
        
        try {
            $query = "SELECT * FROM conteudo_noticia ORDER BY id DESC LIMIT :limit;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
            
            return $result ?: [];

        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return [];
        } 
    }

}
