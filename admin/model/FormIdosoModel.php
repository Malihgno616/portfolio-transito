<?php 

namespace Model;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

class FormIdosoModel {
    
    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function paginatedIdosos($page, $limit)
    {
        try {
            if($page < 1) $page = 1;
            $offset = ($page -1) * $limit; 

            // Primeiro obtemos o total
            $countStmt = $this->pdo->query("SELECT COUNT(*) as total FROM cartao_idoso");
            $total = $countStmt->fetch()['total'];
            $totalPages = ceil($total / $limit);

            // Depois os dados paginados
            $stmt = $this->pdo->prepare("SELECT * FROM cartao_idoso ORDER BY id DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            $idosos = $stmt->fetchAll();
            
            return [
                'idosos' => $idosos,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => $totalPages
            ];
            
        } catch (PDOException $e) {
            // Log do erro ou tratamento adequado
            error_log("Erro ao buscar idosos: " . $e->getMessage());
            return [
                'idosos' => [],
                'total' => 0,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => 0
            ];
        }
    }

    public function idosoCountTable()
    {
        try {
            $query = "SELECT COUNT(*) as total FROM cartao_idoso"; 
            $stmt = $this->pdo->query($query);
            $row = $stmt->fetch();
            return $row['total'];
        } catch (PDOException $e) {
            error_log("Erro ao contar idosos: " . $e->getMessage());
            return 0;
        }
    }

    public function getIdosoById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM cartao_idoso WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Erro ao buscar idoso por ID: " . $e->getMessage());
            return null;
        }
    }

    public function deleteIdoso($id)
    {
        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare("DELETE FROM cartao_idoso WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            if ($stmt->rowCount() === 0) {
                $this->pdo->rollBack();
                return "Nenhum registro encontrado para deletar.";
            }

            $this->pdo->commit();
            return true;

        } catch(PDOException $e) {
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
            error_log("Erro ao deletar idoso: " . $e->getMessage());
            return "Erro ao deletar idoso: " . $e->getMessage();
        }
    }

}