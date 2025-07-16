<?php 

class Conn {
  private $host;
  private $user;
  private $pass;
  private $db;

  private $conn;

  private $connected;

  public function __construct($host, $user, $pass, $db) {
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->db = $db;
  }

  public function connect() {
    try {
      $this->conn = new PDO(
        "mysql:host=$this->host;dbname=$this->db;charset=utf8mb4",
        $this->user,
        $this->pass
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connected = true;
    } catch(PDOException $e) {
      $this->connected = false;
    }

    return $this->response(); 
  }

  private function response()
  {
    if($this->connected) {
      return $this->conn;
    } else {
      return false;
    }
  }

}