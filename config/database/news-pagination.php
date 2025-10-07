<?php

require_once __DIR__. '/conn.php';

use ConnectionClientSide\ConnectionClientSide;

$conn = new ConnectionClientSide();

$pdo = $conn->connect();

$newsPerPage = 6;
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$offset = ($page - 1) * $newsPerPage;
if($page < 1) $page = 1; 
$page = max(1, $page);

try {

  $queryCount = "SELECT COUNT(DISTINCT np.id_noticia) as total 
    FROM noticia_principal np
    INNER JOIN conteudo_noticia cn ON np.id_noticia = cn.noticia_id
  ";
  $stmtCount = $pdo->prepare($queryCount);
  $stmtCount->execute();
  $totalNews = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];
  $totalPages = ceil($totalNews / $newsPerPage);

  if ($page > $totalPages) {
    $page = $totalPages;
  }

  $query = "SELECT DISTINCT
        np.id_noticia,
        np.titulo_principal,
        np.subtitulo AS subtitulo_principal,
        cn.titulo_conteudo,
        cn.subtitulo_conteudo,
        cn.texto_conteudo as texto
    FROM 
        noticia_principal np
    JOIN 
        conteudo_noticia cn ON np.id_noticia = cn.noticia_id
    GROUP BY np.id_noticia
    ORDER BY np.id_noticia DESC
    LIMIT :limit OFFSET :offset";

  $stmt = $pdo->prepare($query);
  $stmt->bindValue(':limit', $newsPerPage, PDO::PARAM_INT);
  $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);  

  $stmt->execute();

  $news = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch(PDOException $e) {
  echo "Erro ao mostrar as notícias" . $e->getMessage();
}

function obtainContentNews($newsId) {
  try {
      $conn = new ConnectionClientSide();
      $pdo = $conn->connect();
      
      $stmt = $pdo->prepare("SELECT 
                                titulo_conteudo, 
                                subtitulo_conteudo, 
                                texto_conteudo as texto
                             FROM conteudo_noticia 
                             WHERE noticia_id = :newsId 
                             ORDER BY id_conteudo ASC"); 
      
      $stmt->bindParam(':newsId', $newsId, PDO::PARAM_INT);
      $stmt->execute();
      
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
      
  } catch(PDOException $e) {
      error_log("Erro ao obter conteúdos: " . $e->getMessage());
      return [];
  }
}