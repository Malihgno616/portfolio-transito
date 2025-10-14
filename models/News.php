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

    public function detailedNews($id)
    {
        try {
            $query = "SELECT
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
            WHERE id_noticia = :id_noticia
            ";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id_noticia", $id, PDO::PARAM_INT);

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
            
            // Verifica se é um array antes de retornar
            if(is_array($result)) {
                return $result;
            } else {
                return [];
            }

        } catch(PDOException $e) {
            // Log do erro (em produção)
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
