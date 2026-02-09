<?php 

namespace Models;

require_once __DIR__.'/../config/database/conn.php';
require_once __DIR__.'/../config/database/env.php';

use PDO, PDOException;

class Request {

    private $conn;
    private $pdo;

    public function __construct()
    {
        $this->conn = new \Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function verifyDocReg($registration, $imgDoc = null)
    {
        try {

            $query = "SELECT * FROM cartao_deficiente WHERE rg_beneficiario = :rg_beneficiario";

            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(":rg_beneficiario", $registration, PDO::PARAM_STR);
            
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
            
        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }

    public function send2aViaRequest($rgBeneficiario, $imgBoletim, $imgBoletimName)
    {
        try {

            $query = "INSERT INTO solicitacao_2a_via (rg_beneficiario, file_boletim, img_bo) VALUES (:rg_beneficiario, :img_boletim, :img_boletim_name)";

            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(':rg_beneficiario', $rgBeneficiario, PDO::PARAM_STR);
            
            $stmt->bindValue(':img_boletim', $imgBoletim, PDO::PARAM_LOB);
            
            $stmt->bindValue(':img_boletim_name', $imgBoletimName, PDO::PARAM_STR);

            return $stmt->execute();
            
        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }
    }

    public function sendNotification($descricao = "", $categoria = "")
    {

        try {

            $query = "INSERT INTO notificacoes (descricao, categoria) VALUES (:desc, :cat)";

            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(':desc', $descricao);
            
            $stmt->bindValue(':cat', $categoria);
            
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
                
        } catch(PDOException $e) {
            error_log("Error: " . $e->getMessage());
            return false;
        }

    }

}