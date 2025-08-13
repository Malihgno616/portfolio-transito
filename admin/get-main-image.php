<?php
// test-display-image.php
session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

require __DIR__.'/model/NewsModel.php';

use Model\NewsModel\NewsModel;

$newsModel = new NewsModel();

// Verifica se o parâmetro de ID foi passado
$testId = 15; // ID para teste - altere conforme sua base
$type = 'main'; // 'main' ou 'content'

try {
    if ($type === 'main') {
        // Obtém os dados da notícia principal
        $news = $newsModel->getMainNews($testId);
        
        if (!$news) {
            throw new Exception("Notícia com ID $testId não encontrada");
        }
        
        $imageData = $news['img_noticia'];
        $imageName = $news['nome_img_noticia'];
        
        if (!$imageData) {
            throw new Exception("Nenhum dado de imagem encontrado para a notícia ID $testId");
        }
    } else {
        // Implemente para conteúdo se necessário
        throw new Exception("Tipo de imagem não suportado para teste");
    }
    
    // Determina o tipo MIME
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($imageData);
    
    // Cria uma página HTML de teste
    header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Exibição de Imagem</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .image-info { background: #f5f5f5; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .test-image { max-width: 100%; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Teste de Exibição de Imagem</h1>
        
        <div class="image-info">
            <h2>Informações da Imagem</h2>
            <p><strong>ID da Notícia:</strong> <?= htmlspecialchars($testId) ?></p>
            <p><strong>Nome do Arquivo:</strong> <?= htmlspecialchars($imageName) ?></p>
            <p><strong>Tipo MIME:</strong> <?= htmlspecialchars($mimeType) ?></p>
            <p><strong>Tamanho dos Dados:</strong> <?= strlen($imageData) ?> bytes</p>
        </div>
        
        <h2>Imagem Exibida</h2>
        <?php if (strpos($mimeType, 'image/') === 0): ?>
            <img src="data:<?= $mimeType ?>;base64,<?= base64_encode($imageData) ?>" 
                 alt="Imagem de teste" class="test-image">
        <?php else: ?>
            <p>Tipo de arquivo não é uma imagem reconhecida: <?= $mimeType ?></p>
        <?php endif; ?>
        
        <h2>Código para Implementação</h2>
        <p>Para implementar em seu sistema, use:</p>
        <pre>&lt;img src="display-image.php?id=&lt;?= $news['id_noticia'] ?&gt;&amp;type=main" 
     alt="&lt;?= htmlspecialchars($news['nome_img_noticia']) ?&gt;"&gt;</pre>
    </div>
</body>
</html>
<?php
} catch (Exception $e) {
    header("Content-Type: text/html; charset=UTF-8");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Erro no Teste de Imagem</title>
</head>
<body>
    <h1>Erro no Teste de Exibição de Imagem</h1>
    <p><?= htmlspecialchars($e->getMessage()) ?></p>
    <p>Verifique:
    <ul>
        <li>Se o ID da notícia existe no banco de dados</li>
        <li>Se a notícia possui uma imagem associada</li>
        <li>Se a coluna img_noticia contém dados binários válidos</li>
    </ul>
    </p>
</body>
</html>
<?php
}