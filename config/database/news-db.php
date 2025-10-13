<?php

require_once __DIR__. '/conn.php';

require __DIR__.'/env.php';

$conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$pdo = $conn->connect();

try {
  $query = "SELECT 
  np.id_noticia,
  np.titulo_principal as titulo_principal,
  np.subtitulo AS subtitulo_principal,
  cn.titulo_conteudo as titulo_conteudo,
  cn.subtitulo_conteudo as subtitulo_conteudo,
  cn.texto_conteudo as texto
  FROM 
    noticia_principal np
  INNER JOIN 
    conteudo_noticia cn ON np.id_noticia = cn.noticia_id
  ORDER BY 
    np.id_noticia DESC LIMIT 3;";

  $stmt = $pdo->prepare($query);

  $stmt->execute();

  $news = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    
} catch(PDOException $e) {
  echo "Erro ao mostrar as notícias" . $e->getMessage();
}

function obtainContentNews($newsId) {
  try {
      $conn = new Conn(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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

