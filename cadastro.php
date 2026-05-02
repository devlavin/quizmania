<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cssglob.css">
</head>
<body>
    <div class="page">
        <div class="box">

            <div class="box-header">
                <h2>Crie sua conta</h2>
            </div>
            <?php if (isset($_GET['erro'])): ?>
                <?php if ($_GET['erro'] === 'senha'): ?>
                    <p>As senhas não coincidem!</p>
                <?php elseif ($_GET['erro'] === 'email'): ?>
                    <p>Este e-mail já está cadastrado!</p>
                <?php endif; ?>
            <?php endif; ?>
            <form action="recebe_dados.php" method="post">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="nome" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <select id="genero" name="genero">
                        <option value="" disabled selected>Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="xxxx@gmail.com" required>
                </div>
                <div class="form-group">
                    <label for="cel">Celular</label>
                    <input type="tel" id="cel" name="celular" placeholder="(xx) xxxxx-xxxx" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>
                <div class="form-group">
                    <label for="confirmar">Confirmar Senha</label>
                    <input type="password" id="confirmar" name="confirmar" placeholder="Confirmar senha">
                </div>

                    <button type="submit" class="btn-submit">Criar conta</button>
            </form>
            <div class="extra">
                <h4>Já tem conta?</h4>
                <a href="login.php">Login</a>
                <br><br>
                <a href="index.html">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>