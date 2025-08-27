<?php 

namespace Model;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;

class FormDeficienteModel {

    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function paginatedDeficientes($page, $limit)
    {
        try {
            if($page < 1) $page = 1;
            $offset = ($page -1) * $limit; 

            // Primeiro obtemos o total
            $countStmt = $this->pdo->query("SELECT COUNT(*) as total FROM cartao_deficiente");
            $total = $countStmt->fetch()['total'];
            $totalPages = ceil($total / $limit);

            // Depois os dados paginados
            $stmt = $this->pdo->prepare("SELECT * FROM cartao_deficiente ORDER BY id DESC LIMIT :limit OFFSET :offset");
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            
            $deficientes = $stmt->fetchAll();
            
            return [
                'deficientes' => $deficientes,
                'total' => $total,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => $totalPages
            ];
            
        } catch (PDOException $e) {
            // Log do erro ou tratamento adequado
            error_log("Erro ao buscar deficientes: " . $e->getMessage());
            return [
                'deficientes' => [],
                'total' => 0,
                'page' => $page,
                'limit' => $limit,
                'totalPages' => 0
            ];
        }
    }

    public function deficienteCountTable()
    {
        try {
            $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM cartao_deficiente");
            $total = $stmt->fetch()['total'];
            return $total;
        } catch (PDOException $e) {
            // Log do erro ou tratamento adequado
            error_log("Erro ao contar deficientes: " . $e->getMessage());
            return 0;
        }
    }

}
