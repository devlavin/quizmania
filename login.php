<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="cssglob.css">
</head>
<body>
    <div class="page">
        <div class="box">
                <div class="box-header">
                    <h2>Faça Login</h2>
                </div>
                    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'credenciais'): ?>
                        <p style="color: red; margin-bottom: 1rem;">E-mail ou senha incorretos.</p>
                    <?php endif; ?>
                    <form action="receber_login.php" method="post">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" placeholder="Senha" required>
                        </div>
                        <button type="submit" class="btn-submit">Entrar</button>
                    </form>
                    <div class="extra">
                        <h4>Ainda não tem conta?</h4>
                        <a href="cadastro.php">Cadastre-se</a>
                        <br><br>
                        <a href="index.html">Voltar</a>
                    </div>
        </div>
    </div>
</body>
</html>