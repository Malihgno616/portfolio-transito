<?php 

namespace Models;

use PDO, PDOException;

require __DIR__.'/../config/database/conn.php';

require __DIR__.'/../config/database/env.php';


class News {
    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new \Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function getNewsImagem($id)
    {
        return null;
    }

    public function paginatedNews($page, $limit, $offset)
    {
        return null;
    }

    public function recentNews($limit)
    {
        try {
            $query = "SELECT 
            np.id_noticia,
            np.titulo_principal as titulo_principal,
            np.subtitulo AS subtitulo_principal
            FROM 
                noticia_principal np
            LEFT JOIN 
                conteudo_noticia cn ON np.id_noticia = cn.noticia_id
            ORDER BY 
                np.id_noticia DESC LIMIT :limit;";

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
