<?php
require 'conexao.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// 1. Pega os dados do formulário
$nome      = $_POST['nome']      ?? '';
$genero    = $_POST['genero']    ?? '';
$email     = $_POST['email']     ?? '';
$celular   = $_POST['celular']   ?? '';
$senha     = $_POST['senha']     ?? '';
$confirmar = $_POST['confirmar'] ?? '';

// 2. Valida se as senhas batem
if ($senha !== $confirmar) {
    header('Location: cadastro.php?erro=senha');
    exit;
}

// 3. Só agora criptografa
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// 4. Prepara e executa o INSERT
$sql = "INSERT INTO usuario (nome, genero, email, celular, senha)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param('sssss', $nome, $genero, $email, $celular, $senha_hash);
//                  ^^^^
//                  5 letras = 5 variáveis

if ($stmt->execute()) {
    header('Location: login.php');
    exit;
} else {
    if ($conn->errno === 1062) {
        header('Location: cadastro.php?erro=email');
        exit;
    }
    echo 'Erro ao cadastrar. Tente novamente.';
}
?>