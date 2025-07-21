<?php 

namespace Model\ContactModel;

require __DIR__.'/../config/conn.php';
require __DIR__.'/../config/env.php';

use Conn;

class ContactModel {

  private $conn;
  private $pdo;

  public function __construct() {
    $this->conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $this->pdo = $this->conn->connect();
  }

  public function paginatedContacts($page, $limit)
  {

    if($page < 1) $page = 1;

    $offset = ($page -1) * $limit; 

    $stmt = $this->pdo->prepare("SELECT * FROM form_contato LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
    $stmt->execute();
    $contacts = $stmt->fetchAll();
    
    $total = $this->contactCountTable();
    $totalPages = ceil($total / $limit);
    
    return [
        'contacts' => $contacts,
        'total' => $total,
        'page' => $page,
        'limit' => $limit,
        'totalPages' => $totalPages
    ];
  }

  public function contactCountTable()
  {
    $query = "SELECT COUNT(*) as total FROM form_contato";
    $stmt = $this->pdo->query($query);
    $row = $stmt->fetch();
    return $row['total'];
  }
   
}