<?php 

namespace Model;

require_once __DIR__.'/../config/conn.php';

require_once __DIR__.'/../config/env.php';

use Conn;
use PDO;
use PDOException;

class TelaSiteModel {
    private $conn;
    private $pdo;

    public function __construct() {
        $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);   
        $this->pdo = $this->conn->connect();
    }

    public function pagesTable()
    {
        try {

            $query = "SELECT id, titulo_pagina FROM telas ORDER BY id";

            $stmt = $this->pdo->prepare($query);

            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            error_log("Error:" . $e->getMessage());
            return false;
        }
    }

    public function selectTitleById($id)
    {
        try {
            $query = "SELECT id, titulo_pagina FROM telas WHERE id = :id";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);           

            return $result ? $result['titulo_pagina'] : 'Página não encontrada';

        } catch(PDOException $e) {
            error_log("Error: ". $e->getMessage());
            return false;
        }
    }

    public function addContentPage($id, $content)
    {
        try {
            $query = "INSERT INTO conteudo_paginas (conteudo, id_tela) VALUES (:conteudo, :id)";                      

            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(":id", $id, PDO::PARAM_INT);
            
            $stmt->bindValue(":conteudo", $content, PDO::PARAM_STR);

            return $stmt->execute();

        } catch(PDOException $e) {
            error_log("Error: ". $e->getMessage());
            return false;
        }
    }

    public function editContentPage($id, $content)
    {
        try {

            $query = "UPDATE conteudo_paginas SET conteudo = :conteudo WHERE id_tela = :id";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id", $id, PDO::PARAM_INT);

            $stmt->bindValue(":conteudo", $content, PDO::PARAM_STR);

            return $stmt->execute();

        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }

    public function getContentById($id)
    {
        try {
            $query = "SELECT * FROM conteudo_paginas WHERE id_tela = :id";

            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }

    

}