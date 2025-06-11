<?php

include __DIR__.'conn.php';

$conn = new Conn();

$pdo = $conn->connect();

try {
  $query = "SELECT 
	noticia_principal.id_noticia,
  noticia_principal.titulo_principal AS titulo_principal,
  noticia_principal.subtitulo AS subtitulo_principal,
  conteudo_noticia.id_conteudo,
  conteudo_noticia.noticia_id,
  conteudo_noticia.titulo_conteudo AS titulo_conteudo,
  conteudo_noticia.subtitulo_conteudo AS subtitulo_conteudo,
  conteudo_noticia.texto_conteudo AS texto
  FROM 
      conteudo_noticia 
  INNER JOIN 
      noticia_principal 
  ON 
      noticia_principal.id_noticia = conteudo_noticia.id_conteudo
  LIMIT 6;";

  $stmt = $pdo->prepare($query);

  $stmt->execute();

  $news = $stmt->fetchAll(PDO::FETCH_ASSOC); 
  

} catch(PDOException $e) {
  echo "Erro ao mostrar as notícias" . $e->getMessage();
}
