<?php 

namespace Models;
require __DIR__.'/../config/database/conn.php';
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../config/database/env.php';

use PDO;

use Predis\Client;

use PDOException;

class News {
    private $conn;
    private $pdo;
    private $redis;
    public function __construct() 
    {
        $this->conn = new \Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
        $this->redis = new Client([
            'scheme' => 'tcp',
            'host' => $_ENV['REDIS_HOST'],
            'port' => $_ENV['REDIS_PORT'],
            'password' => $_ENV['REDIS_PASS'],
        ]);
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

   public function paginatedNews($page, $limit, $offset)
   {
        try {
            if($page < 0) $page = 1;

            $query = "SELECT DISTINCT
                np.id_noticia,
                np.titulo_principal,
                np.subtitulo AS subtitulo_principal
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
            $query = "SELECT COUNT(DISTINCT np.id_noticia) as total 
                    FROM noticia_principal np 
                    JOIN conteudo_noticia cn ON np.id_noticia = cn.noticia_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ?? 0;
            
        } catch(PDOException $e) {
            error_log("Erro ao contar notícias: " . $e->getMessage());
            return 0;
        }
    }

    public function featuredNews($limit)
    {

        $cacheKey = "noticias_destaque_" . $limit;

        $cached = $this->redis->get($cacheKey);
        
        if($cached !== null) {
            return json_decode($cached, true);
        }
        
        try {
            $query = "SELECT * FROM conteudo_noticia WHERE destaque = 1 ORDER BY id DESC LIMIT :limit;";
                
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->redis->setex($cacheKey, 10, json_encode($result));
            
            return $result ?: [];
            
        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return [];
        }
    }
    
    public function recentNews($limit)
    {
        $cacheKey = "noticias_recentes_" . $limit;
        
        $cached = $this->redis->get($cacheKey);
        
        if($cached !== null) {
            return json_decode($cached, true);
        }
        
        try {
            $query = "SELECT * FROM conteudo_noticia ORDER BY id DESC LIMIT :limit;";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $this->redis->setex($cacheKey, 10, json_encode($result));                     
            
            return $result ?: [];

        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return [];
        } 
    }

}


