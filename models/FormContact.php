<?php 

namespace Models;

require __DIR__.'/../config/database/conn.php';
require __DIR__.'/../config/database/env.php';

use PDO, PDOException;

class FormContact {

    private $conn;
    private $pdo;

    public function __construct() 
    {
        $this->conn = new \Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }

    public function sendContact($name, $email, $phone, $message)
    {
        try {
            $query = "INSERT INTO form_contato (nome, email, telefone, mensagem) VALUES (:nome, :email, :telefone, :mensagem)";

            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(':nome', $name ,PDO::PARAM_STR);
            $stmt->bindValue(':email', $email ,PDO::PARAM_STR);
            $stmt->bindValue(':telefone', $phone ,PDO::PARAM_STR);
            $stmt->bindValue(':mensagem', $message ,PDO::PARAM_STR);
            
            return $stmt->execute();

        } catch(PDOException $e) {
            error_log("Erro: " . $e->getMessage());
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