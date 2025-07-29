<?php 

namespace Model\NewsModel;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;
use PDO, PDOException;
use Exception;

class NewsModel { 

  private $conn;

  private $pdo;

  public function __construct() {
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $this->pdo = $this->conn->connect();
  }

}