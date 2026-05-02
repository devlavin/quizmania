<?php
session_start();

// Proteção — só entra se estiver logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// Pega os dados da sessão
$nome   = $_SESSION['usuario_nome'];
$genero = $_SESSION['usuario_genero'];

// Decide o cumprimento pelo gênero
$bemvindo = ($genero === 'M') ? 'Bem-vindo' : 'Bem-vinda';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinoQuiz</title>
    <link rel="stylesheet" href="cssdino.css">
</head>
<body>
    <div class="index-page"> <!-- reutiliza o estilo da index! -->

        <div class="dino-ilustracao">🦖</div>

        <!-- Saudação personalizada -->
        <h1 class="index-titulo">
            <?php echo $bemvindo . ', ' . $nome . '!'; ?>
        </h1>

        <!-- Frase de chamada -->
        <p class="index-sub">
            Está pronto para embarcar no <strong>Período Jurássico</strong>?<br>
            Prove que você sabe tudo sobre a era dos grandes répteis!
        </p>

        <!-- Botão principal -->
        <div class="index-botoes">
            <a href="quiz.php" class="btn-dino btn-primario">Vamos lá! 🦕</a>
        </div>

        <!-- Link de sair -->
        <a href="logout.php" class="link-sair">Sair</a>

    </div>
</body>
</html>