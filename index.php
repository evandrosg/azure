<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="processa_cadastro.php" method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
