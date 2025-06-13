<?php

require_once __DIR__. '/conn.php';

$conn = new Conn();

$pdo = $conn->connect();

$newsPerPage = 6;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $newsPerPage;
if($page < 1) $page = 1; 

try {

  $queryCount = "SELECT COUNT(DISTINCT np.id_noticia) as total FROM noticia_principal np";
  $stmtCount = $pdo->prepare($queryCount);
  $stmtCount->execute();
  $totalNews = $stmtCount->fetch(PDO::FETCH_ASSOC)['total'];
  $totalPages = ceil($totalNews / $newsPerPage);

  $query = "SELECT 
        np.id_noticia,
        np.titulo_principal,
        np.subtitulo AS subtitulo_principal,
        cn.titulo_conteudo,
        cn.subtitulo_conteudo,
        cn.texto_conteudo as texto
    FROM 
        noticia_principal np
    LEFT JOIN 
        conteudo_noticia cn ON np.id_noticia = cn.noticia_id
    GROUP BY np.id_noticia
    ORDER BY np.id_noticia
    LIMIT :limit OFFSET :offset";

  $stmt = $pdo->prepare($query);
  $stmt->bindValue(':limit', $newsPerPage, PDO::PARAM_INT);
  $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);  

  $stmt->execute();

  $news = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch(PDOException $e) {
  echo "Erro ao mostrar as notícias" . $e->getMessage();
}
