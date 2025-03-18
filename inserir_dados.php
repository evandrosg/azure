<?php
// Defina a chave API
$api_key = "MinhaChaveSuperSecreta123";

// Aceita tanto POST quanto GET
$received_key = $_POST['api_key'] ?? $_GET['api_key'] ?? '';

if ($received_key !== $api_key) {
    die("Acesso negado: Chave API inválida.");
}

// Conectar ao banco de dados
$server = "esp32server.database.windows.net";
$user = "evandro";
$password = "Senai@106";
$db = "esp32server/SQL_Evandro";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Captura os dados enviados pela ESP32
$temperatura = $_POST['temperature'] ?? $_GET['temperature'] ?? '';
$umidade = $_POST['humidity'] ?? $_GET['humidity'] ?? '';

// Insere os dados no banco
$sql = "INSERT INTO DHT22_Dados (temperatura, umidade) VALUES ('$temperatura', '$umidade')";

if ($conn->query($sql) === TRUE) {
    echo "Dados salvos com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

