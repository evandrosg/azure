<?php
// Configurações do Banco de Dados
$server = "esp32server.database.windows.net";
$user = "evandro"; // Seu usuário do SQL Server
$password = "Senai@106"; // Sua senha do SQL Server
$db = "esp32server/SQL_Evandro"; // Nome do banco de dados

// Defina a chave API
$api_key = "MinhaChaveSuperSecreta123";

// Recebe a chave da ESP32
$received_key = $_POST['api_key'] ?? $_GET['api_key'] ?? '';

// Verifica se a chave está certa
if ($received_key !== $api_key) {
    die("Acesso negado: Chave API inválida.");
}

// Conectar ao banco de dados
$conn = new mysqli($server, $user, $password, $db);

// Testa a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
}

// Pega os dados enviados pela ESP32
$temperatura = $_POST['temperature'] ?? $_GET['temperature'] ?? '';
$umidade = $_POST['humidity'] ?? $_GET['humidity'] ?? '';

// Verifica se os dados estão preenchidos
if (empty($temperatura) || empty($umidade)) {
    die("Erro: Temperatura ou Umidade não recebidas.");
}

// Insere os dados no banco de dados
$sql = "INSERT INTO dbo.usuario (temperatura, umidade, data_hora) VALUES ('$temperatura', '$umidade', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Dados salvos com sucesso!";
} else {
    echo "Erro ao salvar dados: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>