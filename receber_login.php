<?php
        session_start();
        require 'conexao.php';

        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $stmt = $conn->prepare("SELECT id, nome, senha, genero FROM usuario WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id']   = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_genero'] = $usuario['genero'];
            header('Location: home.php');
            exit;
        } else {
            header('Location: login.php?erro=credenciais');
            exit;
        }
    ?>