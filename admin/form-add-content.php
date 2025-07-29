<?php
session_start();

// Verificar se os dados foram enviados
if (empty($_SESSION['main_news'])) {
    header('Location: form-add-news.php');
    exit;
}

// Acessar os dados
$dados = $_SESSION['main_news'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
</head>
<body>
    <h1>Dados Recebidos:</h1>
    <p><strong>Título:</strong> <?php echo htmlspecialchars($dados['title']); ?></p>
    <p><strong>Subtítulo:</strong> <?php echo htmlspecialchars($dados['subtitle']); ?></p>
    
    <?php if ($dados['image']): ?>
        <p><strong>Imagem:</strong> <?php echo htmlspecialchars($dados['image']['name']); ?></p>
    <?php endif; ?>
</body>
</html>