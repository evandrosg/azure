<?php
// Defina uma chave API segura (crie uma aleatória)
$api_key = "MinhaChaveSuperSecreta123";

// Verifica se a chave enviada é válida
if (!isset($_POST['api_key']) || $_POST['api_key'] !== $api_key) {
    die("Acesso negado: Chave API inválida.");
}

// Conectar ao banco de dados
$server = "seu_servidor.database.windows.net";
$user = "seu_usuario";
$password = "sua_senha";
$db = "SQL_Evandro";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Captura os dados enviados pela ESP32
$temperatura = $_POST['temperature'];
$umidade = $_POST['humidity'];

// Insere os dados no banco
$sql = "INSERT INTO DHT22_Dados (temperatura, umidade) VALUES ('$temperatura', '$umidade')";

if ($conn->query($sql) === TRUE) {
    echo "Dados salvos com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
