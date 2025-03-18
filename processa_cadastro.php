<?php
$serverName = "evandroserver.database.windows.net";
$database = "SQL_Evandro";
$username = "evandroend";
$password = "Esg@2021";

// Conectar ao banco de dados
try {
    $conn = new PDO("sqlsrv:server=$serverName;Database=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Receber os dados do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT); // Hash da senha

        // Inserir no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nome, $email, $senha]);

        echo "Cadastro realizado com sucesso!";
    }
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
