<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$acertos = $_SESSION['acertos'] ?? 0;
$nome    = $_SESSION['usuario_nome'];
$genero  = $_SESSION['usuario_genero'];
$total   = 10;

// Mensagem personalizada por pontuação
if ($acertos <= 3) {
    $emoji    = '🦴';
    $mensagem = 'Precisa estudar mais sobre a era dos dinossauros!';
} elseif ($acertos <= 6) {
    $emoji    = '🦕';
    $mensagem = 'Bom começo! Você conhece alguns dinossauros.';
} elseif ($acertos <= 8) {
    $emoji    = '🦖';
    $mensagem = 'Muito bom! Você manja bastante da era jurássica!';
} else {
    $emoji    = '🏆';
    $mensagem = 'Incrível! Você é um verdadeiro paleontólogo!';
}

// Limpa o placar da sessão pra poder jogar de novo
unset($_SESSION['acertos']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="cssglob.css">
    <link rel="stylesheet" href="cssdino.css">
</head>
<body>
    <div class="index-page">

        <div class="dino-ilustracao"><?php echo $emoji; ?></div>

        <h1 class="index-titulo">
            <?php echo $acertos; ?> de <?php echo $total; ?> acertos!
        </h1>

        <p class="index-sub">
            <?php echo $mensagem; ?>
        </p>

        <div class="index-botoes">
            <a href="quiz.php?p=0" class="btn-dino btn-primario">Jogar de novo</a>
            <a href="home.php"     class="btn-dino btn-secundario">Voltar ao início</a>
        </div>

    </div>
</body>
</html>