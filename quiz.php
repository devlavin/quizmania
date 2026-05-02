<?php
session_start();

// Proteção — só entra se estiver logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

// ============================================
// 1. BANCO DE PERGUNTAS
// Cada pergunta tem: texto, 4 opções e o índice da certa (0, 1, 2 ou 3)
// ============================================
$perguntas = [
    [
        'pergunta' => 'Qual dinossauro era conhecido como "lagarto tirano"?',
        'opcoes'   => ['Velociraptor', 'Tyrannosaurus Rex', 'Triceratops', 'Brachiosaurus'],
        'certa'    => 1
    ],
    [
        'pergunta' => 'Quantas hastes tinha o Triceratops na cabeça?',
        'opcoes'   => ['1', '2', '3', '4'],
        'certa'    => 2
    ],
    [
        'pergunta' => 'O Brachiosaurus era um dinossauro:',
        'opcoes'   => ['Carnívoro', 'Herbívoro', 'Onívoro', 'Insetívoro'],
        'certa'    => 1
    ],
    [
        'pergunta' => 'Em que período viveu o T-Rex?',
        'opcoes'   => ['Triássico', 'Jurássico', 'Cretáceo', 'Permiano'],
        'certa'    => 2
    ],
    [
        'pergunta' => 'Qual dinossauro tinha penas e era parente das aves?',
        'opcoes'   => ['T-Rex', 'Ankylosaurus', 'Velociraptor', 'Diplodocus'],
        'certa'    => 2
    ],
    [
        'pergunta' => 'O Ankylosaurus se defendia com:',
        'opcoes'   => ['Chifres', 'Veneno', 'Cauda com clava óssea', 'Garras afiadas'],
        'certa'    => 2
    ],
    [
        'pergunta' => 'Qual era o maior dinossauro carnívoro?',
        'opcoes'   => ['T-Rex', 'Spinosaurus', 'Allosaurus', 'Giganotosaurus'],
        'certa'    => 1
    ],
    [
        'pergunta' => 'Os dinossauros surgiram em qual período?',
        'opcoes'   => ['Jurássico', 'Cretáceo', 'Triássico', 'Carbonífero'],
        'certa'    => 2
    ],
    [
        'pergunta' => 'Qual animal moderno é mais próximo dos dinossauros?',
        'opcoes'   => ['Crocodilo', 'Lagarto', 'Ave', 'Tartaruga'],
        'certa'    => 2
    ],
    [
        'pergunta' => 'O que causou a extinção dos dinossauros?',
        'opcoes'   => ['Vulcões', 'Asteroide', 'Glaciação', 'Epidemia'],
        'certa'    => 1
    ],
];

$total = count($perguntas); // 10 perguntas

// ============================================
// 2. PEGA QUAL PERGUNTA É AGORA
// A URL vai ser quiz.php?p=0, quiz.php?p=1...
// ============================================
$atual = isset($_GET['p']) ? (int)$_GET['p'] : 0;

// Se passou de todas as perguntas, vai pro resultado
if ($atual >= $total) {
    header('Location: resultado.php');
    exit;
}

// ============================================
// 3. PROCESSA A RESPOSTA (quando o usuário clicou)
// ============================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pega a resposta que o usuário escolheu
    $resposta = isset($_POST['resposta']) ? (int)$_POST['resposta'] : -1;

    // Inicializa o placar na sessão se ainda não existe
    if (!isset($_SESSION['acertos'])) {
        $_SESSION['acertos'] = 0;
    }

    // Verifica se acertou
    if ($resposta === $perguntas[$atual]['certa']) {
        $_SESSION['acertos']++;
    }

    // Vai pra próxima pergunta
    $proxima = $atual + 1;
    header('Location: quiz.php?p=' . $proxima);
    exit;
}

// Pergunta atual
$q = $perguntas[$atual];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DinoQuiz</title>
    <link rel="stylesheet" href="cssglob.css">
    <link rel="stylesheet" href="cssdino.css">
</head>
<body>
    <div class="index-page">

        <!-- Progresso: "Pergunta 1 de 10" -->
        <p class="quiz-progresso">
            Pergunta <?php echo $atual + 1; ?> de <?php echo $total; ?>
        </p>

        <!-- Barra de progresso visual -->
        <div class="quiz-barra-fundo">
            <div class="quiz-barra-preenchida"
                 style="width: <?php echo (($atual) / $total) * 100; ?>%">
            </div>
        </div>

        <!-- Texto da pergunta -->
        <h2 class="quiz-pergunta">
            <?php echo $q['pergunta']; ?>
        </h2>

        <!-- Formulário com as opções -->
        <form action="quiz.php?p=<?php echo $atual; ?>" method="post">
            <div class="quiz-opcoes">
                <?php foreach ($q['opcoes'] as $i => $opcao): ?>
                    <button type="submit" name="resposta" value="<?php echo $i; ?>" class="quiz-btn">
                        <?php echo $opcao; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </form>

    </div>
</body>
</html>