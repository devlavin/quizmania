<?php
    $host    = 'localhost';  // endereço do servidor — localhost = sua própria máquina
    $banco   = 'quizmania';  // nome do banco de dados que você criou no MySQL
    $usuario = 'root';       // usuário do MySQL (root é o padrão do XAMPP/WAMP)
    $senha   = '';           // senha do MySQL (vazia = padrão no XAMPP local)

    // Cria a conexão usando as variáveis acima
    $conn = new mysqli($host, $usuario, $senha, $banco);

    // Testa se a conexão falhou
    if ($conn->connect_error) {
        die('Erro na conexão: ' . $conn->connect_error);
        // die() = para tudo e mostra a mensagem de erro
    }
?>