<?php

require_once __DIR__. '/conn.php';

$conn = new Conn();

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
LEFT JOIN 
  conteudo_noticia cn ON np.id_noticia = cn.noticia_id
ORDER BY 
  np.id_noticia LIMIT 6;";

  $stmt = $pdo->prepare($query);

  $stmt->execute();

  $news = $stmt->fetchAll(PDO::FETCH_ASSOC); 

} catch(PDOException $e) {
  echo "Erro ao mostrar as notícias" . $e->getMessage();
}
