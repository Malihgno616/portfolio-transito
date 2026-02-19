<?php 

namespace Model;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;


class LoginModel {
    private $conn;
    private $pdo;

    public function __construct() {
        $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $this->pdo = $this->conn->connect();
    }    

    public function verifyUser($userLogin)
    {
        try {
            $query = "SELECT id, user_login, pass from login_adm WHERE user_login = :user_login";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':user_login', $userLogin);
            $stmt->execute(); 

            if($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }

        } catch(PDOException $e) {
            error_log("Error: ". $e->getMessage());
            return false;
        }
    }

}